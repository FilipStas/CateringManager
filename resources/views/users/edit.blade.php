<x-layout>
    <div class=" d-flex justify-content-center align-items-center py-5 ">
        <div class="card shadow-lg  p-4" >
            <h2 class="text-center mb-4">Upraviť používateľa {{$user->id}}</h2>

            <form action="{{ route('users.update', $user) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Meno</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Heslo</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Zadaj nové heslo">
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Potvrdenie hesla</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Potvrď heslo">
                </div>
                <div class="d-flex gap-3">
                    <button type="submit" class="nav-btn">Uložiť zmeny</button>
                    <a href="{{route('users.index', $user)}}" class="nav-btn">
                        Naspäť
                    </a>
                </div>
            </form>

            <div class="d-flex justify-content-center mt-4">
                <form action="{{ route('users.destroy', $user) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link p-0">Odstrániť používatela</button>
                </form>
            </div>

        </div>
    </div>
</x-layout>
