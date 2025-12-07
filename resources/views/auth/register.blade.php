<x-layout>
    <form class="auth"  method="POST" action="{{route('register')}}" >
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
            placeholder="Your password"
            value="{{old('name')}}"
            required
        >

        <label for="password">heslo</label>
        <input
            type="password"
            name="password"
            placeholder="Your password"
            required
        >

        <label for="password_confirmation">Potvrd heslo</label>
        <input
            type="password"
            name="password_confirmation"
            placeholder="Your password"
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
