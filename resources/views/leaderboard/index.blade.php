<x-layout>
    <div class="container">
        <h1>Leaderboard</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>User</th>
                    <th>Score</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($scores as $index => $score)
                <tr>
                    <td>{{ $index + 1 }}</td> <!-- Rank -->
                    <td>{{ $score->user->name }}</td> <!-- User Name -->
                    <td>{{ $score->score }}</td> <!-- Score -->
                    <td>{{ $score->created_at->format('d M Y, H:i') }}</td> <!-- Date -->
                </tr>
                @empty
                <tr>
                    <td colspan="4">No scores available yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
