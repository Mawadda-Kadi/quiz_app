<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz Game</title>

    <link href="https://8000-mawaddakadi-quizapp-ngx6bj9jzfp.ws-eu117.gitpod.io/build/assets/app-BIkE3b6P.css" rel="stylesheet">




</head>
<body>

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

<main class="container">
    {{ $slot }}
</main>

</body>
</html>