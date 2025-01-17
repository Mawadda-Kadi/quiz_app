<x-layout>
    <div class="container">
        <h1>Player Profile: {{ $user->name }}</h1>
        <p>Email: {{ $user->email }}</p>

        <h2>Best Result</h2>
        <p>
            {{ $bestScore ? $bestScore . ' points' : 'No results yet.' }}
        </p>

        <h2>Scores</h2>
        @if ($scores->isEmpty())
        <p>No scores yet.</p>
        @else
        <ul>
            @foreach ($scores as $score)
            <li>
                {{ $score->score }} points ({{ $score->category }}) - {{ $score->created_at->format('d M Y, H:i') }}
            </li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-danger">Sign Out</button>
        </form>
    </div>
</x-layout>