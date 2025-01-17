<x-layout>
    <div class="container">
        @if (!isset($questions))
        <!-- Category Selection -->
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
        @else
        <!-- Quiz Start -->
        <h1>Quiz: {{ $category }}</h1>

        <form method="POST" action="{{ route('quiz.submit') }}">
            @csrf
            <input type="hidden" name="category" value="{{ $category }}">
            @foreach ($questions as $question)
            <div>
                <p>{{ $question->question }}</p>
                @foreach (json_decode($question->options) as $index => $option)
                <div>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $index }}" required>
                    {{ $option }}
                </div>
                @endforeach
            </div>
            @endforeach
            <button type="submit">Submit</button>
        </form>

        @endif
    </div>
</x-layout>

