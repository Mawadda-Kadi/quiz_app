<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
</head>
<body>

<header>
    <nav>
        <h1>Quiz Game</h1>
        <a href="/quiz/start">Start Game</a>
        <a href="/scoreboard">Scoreboard</a>
        <a href="/player">Me</a>
        <a href="/quiz/instructions">Instructions</a>
    </nav>
</header>

<main class="container">
    {{ $slot }}
</main>

</body>
</html>