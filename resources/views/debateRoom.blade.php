<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Debate Room - DebateMatch</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
            <div class="chat-history" id="chat-history">
                <!-- チャット履歴はここに動的に表示されます -->
            </div>
            <div class="input-area">
                <textarea id="chat-input" placeholder="ここにメッセージを入力..." oninput="adjustTextAreaHeight(this)"></textarea>
                <button onclick="sendMessage()">送信</button>
            </div>
        </section>
    </main>
    <script src="script.js"></script>
    <script>
        function adjustTextAreaHeight(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = textarea.scrollHeight + 'px';
        }

        // CSRF Token for the AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        function sendMessage() {
            const inputArea = document.getElementById('chat-input');
            const chatHistory = document.getElementById('chat-history');
            const message = inputArea.value;

            // Display user's message in the chat history
            chatHistory.innerHTML += '<div>あなた: ' + message + '</div>';

            // Clear input area
            inputArea.value = '';

            // Send data to server and get response from the chatbot
            fetch("{{ route('ask') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => response.json())
            .then(data => {
                // Display bot's message in the chat history
                chatHistory.innerHTML += '<div>Bot: ' + data + '</div>';
            });
        }
    </script>
</body>
</html>
