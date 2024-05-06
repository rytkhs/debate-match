<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リアルタイムチャット</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <style>
        .auto-height-textarea {
            height: auto;
            min-height: 50px;
            overflow-y: hidden;
            resize: none;
            /* Disable resizing */
        }
    </style>
</head>

<body class="bg-gray-100">
       <header class="bg-black text-white fixed top-0 w-full h-14 flex justify-between items-center px-4 z-10">
        <div class="text-lg font-bold">DebateMatch</div>
        <ul class="flex">
            <li><button onclick="exitDebate()" class="py-2 px-4 bg-red-600 rounded hover:bg-red-700">退出</button></li>
        </ul>
    </header>
    <main class="pt-20 p-4 flex justify-between min-h-screen" style="height: calc(100vh - 3.5rem);">
        <aside class="info-panel bg-white p-6 shadow rounded w-64">
            <h2 class="font-bold text-lg">討論テーマ: <span id="topic-name">テクノロジーの未来</span></h2>
            <p id="debate-rules" class="my-4">各参加者は、それぞれのターンで最大2分間話すことができます。</p>
            <div class="timer text-2xl text-green-500 font-bold" id="timer">02:00</div>
        </aside>
        <section class="chat-section flex-1 ml-4 flex flex-col h-[calc(100vh-5rem)]">
            <div class="chat-history flex-grow overflow-auto bg-white p-4 rounded shadow mb-4" id="message-list">
                @foreach ($messages as $message)
                <div
                    class="message {{ $loop->last ? 'text-right bg-blue-100' : 'text-left bg-gray-100' }} p-2 my-2 rounded">
                    <span class="text-sm text-gray-600">{{ $message->created_at->format('H:i') }}</span>
                    <div>{!! nl2br(e($message->message)) !!}</div>
                </div>
                @endforeach
            </div>

            <div class="input-area flex items-center mb-4">
                <textarea id="message" name="message"
                    class="flex-1 p-2 rounded border-2 border-gray-300 auto-height-textarea"
                    placeholder="ここにメッセージを入力..." oninput="adjustTextAreaHeight(this)"></textarea>
                <button id="send-button" onclick="sendMessage()"
                    class="ml-4 py-2 px-4 bg-green-500 text-white rounded hover:bg-green-600 text-sm">送信</button>
            </div>
        </section>
    </main>
    <script>
        function adjustTextAreaHeight(textarea) {
            textarea.style.height = 'auto';
            textarea.scrollHeight > 50 ? textarea.style.height = `${textarea.scrollHeight}px` : textarea.style.height = '50px';
        }

        // function sendMessage() {
        //     const message = document.getElementById('message').value;
        //     const messageList = document.getElementById('message-list');
        //     const newMessage = document.createElement('div');
        //     newMessage.textContent = message;
        //     newMessage.className = 'p-2 my-2 bg-gray-200 rounded';
        //     messageList.appendChild(newMessage);
        //     document.getElementById('message').value = ''; // Clear input field
        //     adjustTextAreaHeight(document.getElementById('message')); // Reset textarea height
        // }

        function exitDebate() {
            window.location.href = '/'; // Redirect to homepage or a designated path
        }
    </script>
</body>

</html>
