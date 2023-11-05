@extends('publico.layouts.layout')
@section('titulo', 'Resultados do Torneio')
@section('conteudo')
    <section class="relative h-[300px]">
        <img src="{{ asset($campeonatos->imagem) }}" alt="Lutadores de Jiu jitsu executam golpe durante treino"
            class="w-full h-full object-cover" />
            <div class="bg-black/70 grid place-items-center absolute inset-0">
                <div>
                    <h1 class="text-center text-4xl text-white mt-4 mb-8">
                        {{ $campeonatos->titulo }}
                </h1>
                <div class="flex gap-2 justify-center text-sm">
                    <p class="text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                        </svg>
                        {{ $campeonatos->codigo }}
                    </p>
                    <p class="text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
                        </svg>
                        {{ $campeonatos->tipo }}
                    </p>
                    <p class="text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                        </svg>
                        {{ $campeonatos->cidade }}-{{ $campeonatos->estado }}
                    </p>
                    <p class="text-white flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                        </svg>
                        <time datetime="2023-11-21">{{ \Carbon\Carbon::parse($campeonatos->data_realizacao)->isoFormat('dddd, D [de] MMMM [de] YYYY') }}</time>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <main class="max-w-7xl mx-2 lg:mx-auto">
        <h2 class="text-center text-3xl text-blue-700 mt-4 mb-8">
            Classificação do torneio
        </h2>
        <section class="rounded-md outline outline-1 outline-gray-200 px-2 py-4">
            <h3 class="text-2xl text-center my-3">
                <span class="bg-yellow-900 px-3 rounded-md text-white">Faixa Marrom</span>
            </h3>
            <h4 class="text-center text-2xl text-gray-800 my-2">Peso Leve</h4>
            <div class="grid lg:grid-cols-2 gap-4">
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Masculino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                        @if($value->faixa == 'Marrom' && $value->peso == 'Leve' && $value->sexo == 'Masculino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Feminino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Leve' && $value->faixa == 'Marrom' && $value->sexo == 'Feminino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>

            <h4 class="text-center text-2xl text-gray-800 my-2">Peso Pesado</h4>
            <div class="grid lg:grid-cols-2 gap-4">
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Masculino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Pesado' && $value->faixa == 'Marrom' && $value->sexo == 'Masculino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Feminino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Pesado' && $value->faixa == 'Marrom' && $value->sexo == 'Feminino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                        @foreach($equipesEncontradas as $equipe)
                                            @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                {{ $equipe->equipe }}
                                            @endif
                                        @endforeach</span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>

        <section class="mt-8 rounded-md outline outline-1 outline-gray-200 px-2 py-4">
            <h3 class="text-2xl text-center mt-6 mb-3">
                <span class="bg-black px-3 rounded-md text-white">Faixa Preta</span>
            </h3>

            <h4 class="text-center text-2xl text-gray-800 my-2">Peso Leve</h4>

            <div class="grid lg:grid-cols-2 gap-4">
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Masculino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Leve' && $value->faixa == 'Preta' && $value->sexo == 'Masculino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Feminino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Leve' && $value->faixa == 'Preta' && $value->sexo == 'Feminino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
            <h4 class="text-center text-2xl text-gray-800 my-2">Peso Pesado</h4>
            <div class="grid lg:grid-cols-2 gap-4">
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Masculino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Pesado' && $value->faixa == 'Preta' && $value->sexo == 'Masculino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="text-gray-900">
                    <h4 class="text-xl border-b pb-2 border-gray-200">Feminino</h4>
                    <ul class="mt-2">
                        @foreach($resultados as $resultado => $value)
                            @if($value->peso == 'Pesado' && $value->faixa == 'Preta' && $value->sexo == 'Feminino')
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        1
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->primeiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->primeiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        2
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->segundo_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->segundo_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                                <li class="odd:bg-gray-200 even:bg-gray-50 flex items-stretch border-b border-gray-100">
                                    <span class="bg-blue-700 text-white inline-flex items-center justify-center py-2 px-4">
                                        3
                                    </span>
                                    <p class="ml-2 font-bold py-1">
                                        {{ $value->terceiro_colocado }}
                                        <span class="block text-blue-700 font-normal text-sm">Equipe:
                                            @foreach($equipesEncontradas as $equipe)
                                                @if($equipe->nome == $value->terceiro_colocado && $equipe->faixa == $value->faixa && $equipe->peso == $value->peso && $equipe->sexo == $value->sexo)
                                                    {{ $equipe->equipe }}
                                                @endif
                                            @endforeach
                                        </span>
                                    </p>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection

