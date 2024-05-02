<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use OpenAI\Laravel\Facades\OpenAI;

class ChatbotController extends Controller
{
    public function index()
    {
        // チャットボットのビューを表示
        return view('chatbot');
    }

    public function ask(Request $request)
    {
        // リクエストからユーザーのメッセージを取得
        $userMessage = $request->input('message');

        // セッションから会話履歴を取得
        $conversation = Session::get('conversation', []);

        // ユーザーのメッセージを会話履歴に追加
        $conversation[] = $userMessage;

        // 全会話を使ってプロンプトを作成（コンテキストとして使用）
        $prompt = implode(" ", $conversation);

        // OpenAIのモデルを使って応答を取得
        $response = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => array_map(function($message) {
                return ['role' => 'user', 'content' => $message];
            }, $conversation)
        ]);

        // ボットの最新の応答を取得し、会話履歴に追加
        $botResponse = $response['choices'][0]['message']['content'];
        $conversation[] = $botResponse;

        // 更新された会話履歴をセッションに保存
        Session::put('conversation', $conversation);

        // ボットの応答をJSON形式で返す
        return response()->json($botResponse);
    }
}
