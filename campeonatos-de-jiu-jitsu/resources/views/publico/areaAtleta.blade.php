@extends('publico.layouts.layoutInside')
@section('titulo', 'Área do Atleta')
@section('conteudo')
    <main class="bg-gray-50">

        @component('publico.layouts._components.alerta_sucesso')
        @endcomponent

        <h1 class="text-blue-700 text-3xl text-center">
            Veja os seus certificados
        </h1>
        <p class="text-center text-gray-800">
            Aqui constam os certificados de todos os torneios que você já participou
        </p>
        <div class="mt-4 rounded-xl overflow-hidden max-w-4xl mx-auto">
            <table class="w-full">
                <thead class="bg-blue-700 text-white">
                    <tr>
                        <th class="p-3">Data do evento</th>
                        <th class="p-3">Nome do evento</th>
                        <th class="p-3">Leia mais</th>
                        <th class="p-3">Ver certificado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campeonatos as $campeonato)
                        <tr class="odd:bg-gray-100 even:bg-gray-50">
                            <td class="p-4">{{ \Carbon\Carbon::parse($campeonato->data_realizacao)->locale('pt_BR')->isoFormat('DD/MM/YYYY') }}</td>
                            <td class="p-4">{{ $campeonato->titulo }}</td>
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <a href="{{ route('home.torneio', [
                                        'titulo' => $campeonato->titulo,
                                        'codigo' => $campeonato->codigo,
                                        'id' => $campeonato->campeonato_id,
                                    ]) }}"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Detalhes do evento
                                    </a>
                                </div>
                            </td>
                            <td class="p-4">
                                <div class="flex justify-center">
                                    <a href="./certificado_participacao.html"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        Certificado
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
