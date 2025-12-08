<x-layout>

    @foreach($users as $user)
        <a href="{{ route('users.show', ['id' => $user->id]) }}">
            {{ $user->name }} - {{ $user->email }} - {{ $user->id }}
        </a>
        <br>
    @endforeach

</x-layout>

