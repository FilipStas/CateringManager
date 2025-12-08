<x-layout>
    <div class="user-info">
        {{$user->name}} - {{$user->email}} - {{$user->id}} - {{$user->created_at}} - {{$user->updated_at}}
    </div>

    <form action="{{ route('users.destroy', $user) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button class="btn"type="submit" onclick="return confirm('Naozaj chcete odstrániť tohto používateľa?')">Odstrániť</button>
    </form>

    <a href="{{ route('users.edit', $user->id) }}">
        <button class="btn" type="button">Upraviť</button>
    </a>
</x-layout>
