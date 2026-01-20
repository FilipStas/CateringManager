<x-layout>
<div class="container w-75 m-0">
    <div class="row">
        <div class="sidebar col-auto">
            <a class="nav-btn" href="{{ route('users.showRegistration') }}">
                    Vytvoriť zamestnanca
            </a>
        </div>
        <div class="col">
            <h3>Zamestnanci</h3>
            <ul class="row list-unstyled p-0 m-0">
                @foreach($users as $user)
                    <li class="col-12 col-md-4 p-2 ">
                        <a class="userbox d-block text-decoration-none" href="{{ route('users.edit', $user->id) }}">
                            <p class="mb-1">Meno: {{ $user->name }}</p>
                            <p class="mb-1">Email: {{ $user->email }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
</x-layout>
