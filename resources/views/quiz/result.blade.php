<x-layout>
    <div class="quiz-result-container">
        <h1>Quiz Result</h1>
        <p>Your score: {{ $score }} / {{ count(session('questions', [])) }}</p>
        <p>Category: {{ $category }}</p>

        <a href="{{ route('quiz.index') }}" class="btn btn-primary">Play Again</a>
    </div>
</x-layout>

