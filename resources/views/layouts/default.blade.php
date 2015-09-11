<html>
<head>
    <title>PlatziPHP y Laravel</title>
    <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
</head>
<body>
    <div class="container">
        @if($currentUser)
            Hola {{ $currentUser->name }},
            <a href="{{ route('auth_destroy_path') }}">Salir</a>
        @else
            <a href="{{ route('auth_show_path') }}">Iniciar Sesión</a>
        @endif
        @yield('content')
    </div>
</body>
</html>