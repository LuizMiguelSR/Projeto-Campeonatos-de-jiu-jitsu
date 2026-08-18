@extends('publico.layouts.layoutInside')
@section('titulo', 'Certificado de Participação')
@section('conteudo')
    <main class="bg-gray-50">

        @component('publico.layouts._components.alerta_sucesso')
        @endcomponent

        <div class="mt-4 max-w-7xl mx-auto flex justify-between">
            <a class="flex items-center gap-2 text-blue-700 hover:text-blue-500" href="{{ route('area_atleta.inicio') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                </svg>

                Voltar
            </a>
            <a class="flex items-center gap-2 text-blue-700 hover:text-blue-500" href="{{ route('area_atleta.download_pdf') }}" target="_blank">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6" >
                    <path
                        d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625z" />
                    <path
                        d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z" />
                </svg>

                Exportar para PDF
            </a>
        </div>
        <div class="min-h-[70vh] grid place-items-center">
            <div class="max-w-7xl w-full py-16 mx-auto my-8 text-gray-900 outline-double outline-blue-700">
                <div class="max-w-5xl mx-auto">
                    <div class="flex items-center justify-center text-4xl">
                        <img src="{{ asset('/imgs/logo.svg') }}" alt="Logo" />
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
                        <p>Agradecemos pela sua participação!</p>
                        <div class="mt-12 flex justify-between items-center">
                            <p>{{ $campeonatos[0]->estado }}, {{ \Carbon\Carbon::parse($campeonatos[0]->data_realizacao)->locale('pt_BR')->isoFormat('DD/MM/YYYY') }}</p>
                            <div class="w-[200px] relative isolate">
                                <img src="{{ asset('/imgs/assinatura.png') }}" alt="Assinatura"
                                    class="mx-auto scale-125 mix-blend-darken" />
                                <span class="block w-full h-px bg-black absolute bottom-12"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
