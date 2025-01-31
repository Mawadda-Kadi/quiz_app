<x-layout>
    <div class="main-container">
        <h1>Welcome to Quiz Game</h1>
        <h3>Choose a Category</h3>
        <ul class="categories">
            @foreach ($categories as $category)
            <li>
                <a href="{{ route('quiz.index', ['category' => $category]) }}">
                    <img src="{{ asset('images/categories/' . strtolower($category) . '.jpeg') }}" alt="{{ $category }}">
                    {{ $category }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</x-layout>
