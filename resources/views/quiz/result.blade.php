<x-layout>
    <div class="container">
    
        <h1>Quiz Results</h1>
        <p>Your score: {{ $score }}</p>

        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Play Again</a>
    </div>
</x-layout>
