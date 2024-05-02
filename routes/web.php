<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DebateController;
use App\Http\Controllers\ChatbotController;


// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/debateRoom', function () {
//     return view('debateRoom');
// });

Route::get('/', [DebateController::class, 'index'])->name('index');

// 討論開始を押したらディベートルームページに移動
Route::get('/debateroom', [DebateController::class, 'debateRoom'])->name('debateRoom');

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('index');
Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('ask');
