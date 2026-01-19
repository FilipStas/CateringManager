<x-layout>
    <div class="container align-items-center   mt-3 w-50  " >
    <form  id="registerForm" method="POST" action="{{route('users.create')}}" >
        @csrf
        <div class="mb-3">
            <label for="email" >Email</label>
            <input
                class="form-control"
                type="email"
                name="email"
                placeholder="Zadaj email"
                value="{{old('email')}}"
                required
            >
        </div>
        <div class="mb-3">
            <label for="name">Meno</label>
            <input
                class="form-control"
                type="text"
                name="name"
                placeholder="Zadaj Meno"
                value="{{old('name')}}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password">heslo</label>
            <input
                class="form-control"
                type="password"
                name="password"
                placeholder="Zadaj heslo"
                required
            >
        </div>
        <div class="mb-3">
            <label for="password_confirmation">Potvrď heslo</label>
            <input
                class="form-control"
                type="password"
                name="password_confirmation"
                placeholder="Zadaj heslo znovu"
                required
            >
        </div>

        <div class="d-flex gap-3">
            <button type="submit" class="nav-btn" >Zaregistrovat </button>
            <a href="{{route('users.index')}}" class="nav-btn">
                Naspat
            </a>
        </div>

        @if($errors->any())
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>
    </div>
</x-layout>
