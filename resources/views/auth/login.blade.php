<x-layout>
    <form class="auth_login"  method="POST" action="{{route('login')}}" >
        @csrf
        <input
        type="email"
        name="email"
        placeholder="Your email"
        value="{{old('email')}}"
        required
        >
        <input
        type="password"
        name="password"
        placeholder="Your password"
        required
        >

    <button type="submit" class="btn" >Prihlasit sa </button>

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


</x-layout>

