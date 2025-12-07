<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CateringManager</title>
    @vite(["resources/css/app.css", "resources/js/app.js"])
</head>

<body>
<header class="header">
    <h1 class="logo">CateringManager</h1>

    <nav class="navigation">
        @guest
        <a href="{{ route('show.register') }}" class="nav-btn">Registrácia</a>
        <a href="{{ route('show.login') }}" class="nav-btn">Prihlásenie</a>
        @endguest
        @auth
        <span>
            Ahoj, {{ auth()->user()->name }}
        </span>
        <a href="{{ route('home') }}" class="nav-btn">Welcome</a>
        <a href="{{ route('polozky') }}" class="nav-btn">Zobraz jedlá</a>
        <a href="{{ route('pridajPolozku') }}" class="nav-btn">Pridaj jedlo</a>
        <form action="{{route('logout')}}" method="POST" >
            @csrf
            <button type="submit" class="nav-btn">Odhlásenie</button>
        </form>
        @endauth
    </nav>
</header>

<main class="content">
    {{ $slot }}
</main>

</body>
</html>
