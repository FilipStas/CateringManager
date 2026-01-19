<x-layout>
    <div class="container align-items-center   mt-3 w-50  " >
    <form  id="registerForm" class="auth"  method="POST" action="{{route('register')}}" >
        @csrf
        <div class="mb-3">
        <label for="email" >Email</label>
        <input
            class="form-control"
            type="email"
            name="email"
            placeholder="Tvoj email"
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
            placeholder="Tvoje Meno"
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
            placeholder="Tvoje heslo"
            required
        >
        </div>
        <div class="mb-3">
        <label for="password_confirmation">Potvrď heslo</label>
        <input
            class="form-control"
            type="password"
            name="password_confirmation"
            placeholder="Tvoje heslo znovu"
            required
        >
        </div>
        <button type="submit" class="nav-btn" >Zaregistrovat </button>

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
