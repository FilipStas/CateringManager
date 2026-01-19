<x-layout>

    @foreach($users as $user)
        <a class="container-fluid.col-md-8" href="{{ route('users.show', ['id' => $user->id]) }}">
            {{ $user->name }}  :  {{ $user->email }}
        </a>
        <br>
    @endforeach

</x-layout>

