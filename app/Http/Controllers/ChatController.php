<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index()
    {
        // 最後の20件を取得
        $messages = Message::orderBy('created_at', 'desc')->take(20)->get();
        $response = [
            'messages' => $messages
        ];
        return view('chat', $response);
    }
}
