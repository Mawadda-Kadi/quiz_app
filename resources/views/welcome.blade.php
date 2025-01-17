<x-layout>
    <h1>Welcome to Quiz Game</h1>

    <div class="container">
        <h1>Choose a Category</h1>
        <ul>
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('quiz.start', ['category' => $category]) }}">
                    {{ $category }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>

    <p>Start the Game</p>
    <a href="/quiz/" class="btn">START</a>
</x-layout>
