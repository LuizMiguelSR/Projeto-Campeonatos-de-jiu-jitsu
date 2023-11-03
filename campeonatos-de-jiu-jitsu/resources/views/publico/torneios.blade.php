@extends('publico.layouts.layout')
@section('titulo', 'Lista de Torneios')
@section('conteudo')
    <div class="bg-blue-700">
        <div class="relative grid place-items-center max-w-7xl w-full mx-2 lg:mx-auto min-h-[200px]">
            @component('publico.layouts._components.alerta_sucesso')
            @endcomponent
            <div>
                <nav class="flex md:absolute left-0" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home.inicio') }}" class="inline-flex items-center text-sm font-medium text-white hover:text-blue-200">
                                <svg class="w-3 h-3 mr-2.5" aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                                </svg>
                                Início
                            </a>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <svg class="w-3 h-3 text-gray-100 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                </svg>
                                <span class="ml-1 text-sm font-medium text-gray-100 md:ml-2">Torneios</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="uppercase text-center text-white text-4xl">Torneios</h1>
            </div>
        </div>
    </div>

    <form method="get" action="{{ route('home.filtrar') }}" class="rounded-lg shadow max-w-7xl m-4 md:mx-auto md:mt-4 outline outline-1 outline-gray-300 p-4 flex flex-col lg:flex-row gap-2">
        <div class="flex-1">
            <label for="Título do evento" class="block mb-2 text-sm font-medium text-gray-900">Título do evento</label>
            <input type="text" name="titulo" id="Título do evento" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Ex: Campeonato Santista" value="{{ request()->input('titulo') }}"/>
        </div>

        <div>
            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900">Tipo</label>
            <select id="tipo" name="tipo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">Selecione</option>
                <option value="Kimono" {{ request()->input('tipo') == 'Kimono' ? 'selected' : '' }}>Kimono</option>
                <option value="No-Gi" {{ request()->input('tipo') == 'No-Gi' ? 'selected' : '' }}>No-Gi</option>
            </select>
        </div>

        <div>
            <label for="estado" class="block mb-2 text-sm font-medium text-gray-900">Estado</label>
            <select id="estado" name="estado" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="">Selecione um estado</option>
                @foreach ($estados as $estado)
                    <option value="{{ $estado }}" {{ request()->input('estado') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="cidade" class="block mb-2 text-sm font-medium text-gray-900">Cidade</label>
            <input type="text" id="cidade" name="cidade" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Cidade do torneio" value="{{ request()->input('cidade') }}"/>
        </div>

        <div class="flex items-end">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                Buscar
            </button>
        </div>
    </form>

    <main class="bg-gray-50">
        <div class="grid lg:grid-cols-4 gap-3 max-w-7xl mx-2 lg:mx-auto">
            @for ($i = 0; $i <= count($campeonatos); $i++)
                @if(isset($campeonatos[$i]))
                    <article class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300">
                        <img src="{{ asset($campeonatos[$i]->imagem) }}" alt="Imagem do torneio" class="rounded-md w-full h-[200px] object-cover"/>
                        <div class="p-3 relative">
                            <div class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center">
                                <p class="text-2xl font-bold" data-calendar>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $campeonatos[$i]->data_realizacao)->format('d') }}</p>
                                <p class="uppercase">{{ \Carbon\Carbon::createFromFormat('Y-m-d', $campeonatos[$i]->data_realizacao)->locale('pt_BR')->isoFormat('MMM') }}</p>
                            </div>
                            <p class="absolute -top-3 left-24 px-3 text-white rounded-xl @if ($campeonatos[$i]->fase === 'Inscrição') bg-green-600 @elseif ($campeonatos[$i]->fase === 'Chaveamento') bg-yellow-600 @elseif ($campeonatos[$i]->fase === 'Resultado') bg-blue-600 @endif">{{ $campeonatos[$i]->fase }}</p>
                            <h3 class="mt-4 uppercase text-xl min-h-[60px]">{{ $campeonatos[$i]->titulo }}</h3>
                            <p class="text-gray-400 flex gap-2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/>
                                </svg>
                                {{ $campeonatos[$i]->tipo }}
                            </p>
                            <p class="text-gray-400 flex gap-2 my-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                {{ $campeonatos[$i]->cidade }}-{{ $campeonatos[$i]->estado }}
                            </p>
                        </div>
                        <a href="{{ route('home.torneio', [
                            'titulo' => $campeonatos[$i]->titulo,
                            'codigo' => $campeonatos[$i]->codigo,
                            'id' => $campeonatos[$i]->id,
                        ]) }}" title="Saiba mais sobre {{ $campeonatos[$i]->titulo }}" class="absolute inset-0"></a>
                    </article>
                @endif
            @endfor
        </div>

        @if ($campeonatosPage->lastPage() > 1)
            <nav aria-label="Paginação torneios">
                <ul class="mt-12 -space-x-px text-lg flex justify-center">
                    <li class="flex items-center justify-center px-4 h-10 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 {{ ($campeonatosPage->currentPage() == 1) ? ' opacity-50 pointer-events-none' : '' }}">
                        <a href="{{ $campeonatosPage->url(1) }}">Anterior</a>
                    </li>
                    @for ($i = 1; $i <= $campeonatosPage->lastPage(); $i++)
                        <li class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 {{ ($campeonatosPage->currentPage() == $i) ? ' font-bold' : '' }}">
                            <a href="{{ $campeonatosPage->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    <li class="flex items-center justify-center px-4 h-10 text-blue-600 font-bold border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 {{ ($campeonatosPage->currentPage() == $campeonatosPage->lastPage()) ? ' opacity-50 pointer-events-none' : '' }}">
                        <a href="{{ $campeonatosPage->url($campeonatosPage->currentPage() + 1) }}" aria-current="page">Próxima</a>
                    </li>
                </ul>
            </nav>
        @endif

    </main>
@endsection
