<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
        <title>OSU BJJ - @yield('titulo')</title>
    </head>
    <body>
        @include('publico.layouts._partials.topoInside')
        @yield('conteudo')
    </body>
        @include('publico.layouts._partials.footer')
</html>
