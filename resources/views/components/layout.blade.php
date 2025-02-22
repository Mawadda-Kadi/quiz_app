<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quiz Game</title>

    <!-- Larvel Mix Assets -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('js/dropdown.js') }}" defer></script>
    <script src="{{ mix('js/footer.js') }}" defer></script>




</head>
<body>
    <div class="game-container">
        <div class="header-container">
            <header>
                <nav>
                    <h1>Quiz Game</h1>
                    <span class="menu-icon">☰</span>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/leaderboard/">Leaderboard</a></li>
                        <li><a href="/quiz/instructions">Instructions</a></li>
                        @auth
                        <li>
                            <a href="{{ route('player.show', ['username' => urlencode(auth()->user()->name)]) }}">
                                {{ auth()->user()->name }}
                            </a>
                        </li>
                        @else
                        <li><a href="/login">Login</a></li>
                        @endauth
                    </ul>
                </nav>
            </header>
        </div>
        <main>
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="footer">
            <div class="footer-content">
                <p>Designed by Mawadda Kadi</p>
                <p id="current-time"></p>
            </div>
        </footer>

    </div>

    <!-- JS Scripts -->
    <script src="/resources/js/footer.js"></script>
    <script src="/resources/js/dropdown.js"></script>
</body>
</html>
