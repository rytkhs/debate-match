<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\DebateController;

use Illuminate\Http\Request;
use App\Events\MessageSent;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/chat', [ChatController::class, 'index']);

Route::get('/debateroom', [DebateController::class, 'debateRoom'])->name('debateRoom');

Route::get('/chatbot', [ChatbotController::class, 'index'])->name('index');
Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('ask');

Route::post('/', function (Request $request) {
    MessageSent::dispatch($request->message);
});


Route::get('/test', function () {
    return view('test');
});
