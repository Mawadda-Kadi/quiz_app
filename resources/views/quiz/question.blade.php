<x-layout>
    <div class="question-container">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: {{ $progress }}%;" aria-valuenow="{{ $progress }}" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h1>Question {{ $index + 1 }}</h1>
        <p>{{ $question->question }}</p>
        <form method="POST" action="{{ route('quiz.submitAnswer') }}">
            @csrf
            <input type="hidden" name="index" value="{{ $index }}">
            @foreach (json_decode($question->options) as $key => $option)
            <div>
                <input type="radio" name="answer" id="option-{{ $key }}" value="{{ $key }}" required>
                <label for="option-{{ $key }}">{{ $option }}</label>
            </div>
            @endforeach
            <div class="controls">
                @if ($index > 0)
                <a href="{{ route('quiz.question', ['index' => $index - 1]) }}" class="btn btn-secondary">Back</a>
                @endif
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </form>
    </div>
</x-layout>
