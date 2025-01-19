<x-layout>
    <h1>Welcome to Quiz Game</h1>

    <div class="container">
        <h1>Choose a Category</h1>
        <ul>
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('quiz.index', ['category' => $category]) }}">
                    {{ $category }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</x-layout>
