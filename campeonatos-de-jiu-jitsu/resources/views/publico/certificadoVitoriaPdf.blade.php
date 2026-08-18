<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
    <title>{{ $campeonatos[0]->titulo }} - Certificado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        th:first-child,
        td:first-child {
            font-size: smaller;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="min-h-[70vh] grid place-items-center">
        <div class="max-w-7xl w-full py-16 mx-auto my-8 text-gray-900 outline-double outline-blue-700">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center justify-center text-4xl">
                    <img src="{{ public_path('/imgs/logo.svg') }}" alt="Logo" />
                    <p id="logo">OSU BJJ</p>
                </div>
                <div class="text-xl">
                    <p class="mt-12">
                        Este certificado é concedido a
                        <strong class="text-blue-800 whitespace-nowrap">{{ $campeonatos[0]->nome }}</strong>, que participou
                        <strong class="text-blue-800 whitespace-nowrap">{{ $campeonatos[0]->titulo }}</strong>, realizado
                        em
                        <strong class="text-blue-800 whitespace-nowrap">{{ $campeonatos[0]->cidade }}-{{ $campeonatos[0]->estado }}</strong>, no dia
                        <strong class="text-blue-800 whitespace-nowrap">{{ \Carbon\Carbon::parse($campeonatos[0]->data_realizacao)->locale('pt_BR')->isoFormat('DD/MM/YYYY') }}</strong>, na faixa
                        <strong class="text-blue-800 whitespace-nowrap">{{ $campeonatos[0]->faixa }}</strong>,
                        no peso
                        <strong class="text-blue-800 whitespace-nowrap">{{ $campeonatos[0]->peso }}</strong>.
                    </p>
                    <p class="my-2">
                        Resultado:
                        <strong class="text-blue-800 whitespace-nowrap">{{ $routePDF }}º Lugar</strong>
                      </p>
                    <p>Agradecemos pela sua participação!</p>
                    <div class="mt-12 flex justify-between items-center">
                        <p>{{ $campeonatos[0]->estado }}, {{ \Carbon\Carbon::parse($campeonatos[0]->data_realizacao)->locale('pt_BR')->isoFormat('DD/MM/YYYY') }}</p>
                        <div class="w-[200px] relative isolate">
                            <img src="{{ public_path('/imgs/assinatura.png') }}" alt="Assinatura"
                                class="mx-auto scale-125 mix-blend-darken" />
                            <span class="block w-full h-px bg-black absolute bottom-12"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
