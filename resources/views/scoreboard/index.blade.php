<x-layout>
    <h1>SCOREBOARD</h1>
    <h2>score: {{ $id }}</h2>

    <ul>
        @foreach($users as $user)
            <li>
                <p>{{ $user[name]}}: {{ $user[name]}}</p>
            </li>
        @endforeach
    </ul>
</x-layout>
