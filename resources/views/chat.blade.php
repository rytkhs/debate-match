<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>リアルタイムチャット</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite('resources/js/app.js')

</head>
<body>
    <header>
        <nav>
            <div class="logo">DebateMatch</div>
            <ul>
                <li><button onclick="exitDebate()" class="exit-btn">退出</button></li>
            </ul>
        </nav>
    </header>
    <main class="debate-room">
        <aside class="info-panel">
            <h2>討論テーマ: <span id="topic-name">テクノロジーの未来</span></h2>
            <p id="debate-rules">各参加者は、それぞれのターンで最大2分間話すことができます。</p>
            <div class="timer" id="timer">02:00</div>
        </aside>
        <section class="chat-section">
            <div class="chat-history" id="message-list">
                @foreach ($messages as $message)
                    <div class="message">{{ $message->message }}</div>
                @endforeach
            </div>
            <div class="input-area">
                <textarea id="message" name="message" placeholder="ここにメッセージを入力..." oninput="adjustTextAreaHeight(this)"></textarea>
                <button id="send-button" onclick="sendMessage()">送信</button>
            </div>
        </section>
    </main>

</body>
</html>
