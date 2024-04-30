<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DebateMatch</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <header>
        <nav>
            <div class="logo">DebateMatch</div>
            <ul>
                <li><a href="#home">ホーム</a></li>
                {{-- <li><a href="#login">ログイン/登録</a></li>
                <li><a href="#profile">プロフィール</a></li> --}}
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1>討論で学ぶ、成長する。</h1>
            <p>興味深いトピックを選択して、AIとの討論を開始しましょう。</p>
        </section>
        <section class="topic-select">
            <h2>トピックを選択</h2>
            <div class="checkbox-group">
                <label><input type="checkbox" name="topic" value="technology"> テクノロジー</label>
                <label><input type="checkbox" name="topic" value="politics"> 政治</label>
                <label><input type="checkbox" name="topic" value="education"> 教育</label>
                <!-- 他のトピックを追加 -->
            </div>
            {{-- <button method="GET" action="/debateroom">討論開始</button> --}}
            <form action="{{ route('debateRoom') }}" method="GET">
                <button type="submit">討論開始</button>
            </form>
        </section>
    </main>
    <footer>
        <p>© 2024 DebateMatch. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>
