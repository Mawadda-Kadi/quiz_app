<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz Game</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
    <div class="game-container">
        <div class="header-container">
            <header>
                <nav>
                    <h1>Quiz Game</h1>
                    <a href="/">Home</a>
                    <a href="/leaderboard/">Leaderboard</a>
                    <a href="/quiz/instructions">Instructions</a>

                    @auth
                    <a href="{{ route('player.show', ['username' => urlencode(auth()->user()->name)]) }}">{{ auth()->user()->name }}</a>
                    @else
                    <a href="/login">Login</a>
                    @endauth

                </nav>
            </header>
        <div>
                <main class="container">
                    {{ $slot }}
                </main>
            </div>
</body>
</html>
