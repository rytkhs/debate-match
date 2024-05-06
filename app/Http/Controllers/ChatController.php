<?php

namespace App\Http\Controllers;
use App\Models\Message;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index()
    {
        // 最後の100件を取得
        $messages = Message::orderBy('created_at', 'asc')->take(100)->get();
        $response = [
            'messages' => $messages
        ];
        return view('chat', $response);
    }
}
