<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chatbot Interface</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Chatbot window -->
    <div class="chatbot-window">
        <div class="chatbot-header">
            <p>チャットボット サポート</p>
            <button id="closeChatbot">x</button>
        </div>
        <div class="chatbot-messages" id="messages"></div>
        <div class="chatbot-input">
            <input type="text" id="userInput" placeholder="質問...">
            <button id="sendMessage">送信</button>
        </div>
    </div>

    <script>
        document.getElementById('closeChatbot').addEventListener('click', function() {
            document.querySelector('.chatbot-window').style.display = 'none';
        });

        document.getElementById('sendMessage').addEventListener('click', function() {
            const userInput = document.getElementById('userInput');
            const messages = document.getElementById('messages');
            const message = userInput.value;

            // Display user's message
            messages.innerHTML += '<div>あなた: ' + message + '</div>';

            // Send data to server
            fetch("{{ route('ask') }}", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ message: message })
            })
            .then(response => response.json())
            .then(data => {
                messages.innerHTML += '<div>Bot: ' + data + '</div>';
            });

            // Clear input field
            userInput.value = '';
        });
    </script>
</body>
</html>
