<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

<body class="antialiased">
    <header>
        <ul>
            <ul>
                <li>
                    <a href="/">Eventos</a>
                </li>
                <li>
                    <a href="/events/create">Criar Eventos</a>
                </li>
                @auth
                    <li>
                        <a href="/dashboard">Meus eventos</a>
                    </li>
                    <li>
                        <form action="/logout" method="POST">
                            @csrf
                            <a href="/logout" onclick="event.preventDefault(); this.closest('form').submit();">
                                Sair
                            </a>
                        </form>
                    </li>
                @endauth
                @guest
                    <li>
                        <a href="/login">Entrar</a>
                    </li>
                    <li>
                        <a href="/register">Cadastrar</a>
                    </li>
                @endguest
            </ul>
        </ul>
    </header>
    @if (session('msg'))
        <p>{{ session('msg') }}</p>
    @endif
    @yield('content')
    <footer>
        <p>HDC Events &copy; 2022</p>
    </footer>
</body>

</html>
