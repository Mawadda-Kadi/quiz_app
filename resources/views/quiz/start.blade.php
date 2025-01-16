<x-layout>
    <div class="container">
        <form method="POST" action="{{ route('quiz.submit') }}">
            @csrf
            @foreach ($questions as $question)
            <div class="mb-3">
                <p>{{ $question->question }}</p>
                @foreach (json_decode($question->options) as $index => $option)
                <div>
                    <input type="radio" name="answers[{{ $question->id }}]" value="{{ $index }}" required>
                    {{ $option }}
                </div>
                @endforeach
            </div>
            @endforeach
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
</x-layout>
