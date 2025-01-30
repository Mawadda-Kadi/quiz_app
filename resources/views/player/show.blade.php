<x-layout>
    <div class="player-container">
        <h1>Player Profile: {{ $user->name }}</h1>

        <div class="best-result">
            <h2>Best Result</h2>
            <p>
                {{ $bestScore ? $bestScore . ' points' : 'No results yet.' }}
            </p>
        </div>

        <div class="scores">
            <h2>Last Scores</h2>
            @if ($scores->isEmpty())
            <p>No scores yet.</p>
            @else
            <ul>
                @foreach ($scores as $score)
                <li>
                    {{ $score->score }} points ({{ $score->category ?? 'Unknown' }}) - {{ $score->created_at->format('d M Y, H:i') }}
                </li>
                @endforeach
            </ul>
            @endif
        </div>
        <form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
            @csrf
            <button type="submit" class="btn btn-danger">Sign Out</button>
        </form>
    </div>
</x-layout>
