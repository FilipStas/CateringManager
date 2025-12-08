<x-layout>
    <form  id="registerForm" class="auth"  method="POST" action="{{route('register')}}" >
        @csrf

        <label for="email" >Email</label>
        <input
            type="email"
            name="email"
            placeholder="Your email"
            value="{{old('email')}}"
            required
        >
        <label for="name">Meno</label>
        <input
            type="text"
            name="name"
            placeholder="Tvoje Meno"
            value="{{old('name')}}"
            required
        >

        <label for="password">heslo</label>
        <input
            type="password"
            name="password"
            placeholder="Tvoje heslo"
            required
        >

        <label for="password_confirmation">Potvrd heslo</label>
        <input
            type="password"
            name="password_confirmation"
            placeholder="Tvoje heslo znovu"
            required
        >

        <button type="submit" class="btn" >Zaregistrovat </button>

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
