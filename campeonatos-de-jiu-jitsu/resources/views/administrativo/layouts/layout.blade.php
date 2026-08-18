<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KBRTEC - @yield('titulo')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('imgs/favicon.ico') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- Script Ckeditor -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <!-- Script JCrop -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/js/jquery.Jcrop.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-jcrop/0.9.15/css/jquery.Jcrop.min.css">
    <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    @include('administrativo.layouts._partials.topo')
    @include('administrativo.layouts._partials.aside')
    @yield('conteudo')
</body>
    @include('administrativo.layouts._partials.footer')
</html>
