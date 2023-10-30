<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC - @yield('titulo')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('imgs/favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    @guest

    @else
        @include('administrativo.layouts._partials.topo')
        @include('administrativo.layouts._partials.aside')
    @endguest
    @yield('conteudo')
</body>
    @include('administrativo.layouts._partials.footer')
</html>
