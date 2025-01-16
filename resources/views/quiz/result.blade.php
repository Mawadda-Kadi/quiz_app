<x-layout>
    <div class="container">
        <h1>Your Score: {{ $score }}</h1>
        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Play Again</a>
    </div>
</x-layout>
