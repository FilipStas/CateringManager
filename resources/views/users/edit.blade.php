<x-layout>
    <h2>Upraviť používateľa: {{$user->name}}</h2>
    <form action="{{ route('users.update', $user) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="{{ $user->name }}">
        <input type="email" name="email" placeholder="{{ $user->email }}">
        <input type="password" name="password">
        <input type="password" name="password_confirmation">

        <button type="submit">Uložiť zmeny</button>
    </form>

</x-layout>
