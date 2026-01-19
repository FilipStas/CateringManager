<x-layout>
    <div class="container align-items-center mt-3 w-50  " >
    <form class="auth_login"  method="POST" action="{{route('login')}}" >
        @csrf
        <div class="mb-3">
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
            <input class="form-control"
            type="password"
            name="password"
            placeholder="Tvoje heslo"
            required
            >
        </div>

    <button type="submit" class="nav-btn" >Prihlásiť sa </button>
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

