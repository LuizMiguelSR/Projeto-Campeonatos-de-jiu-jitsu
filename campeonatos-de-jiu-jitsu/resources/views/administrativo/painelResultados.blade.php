@extends('administrativo.layouts.layout')
@section('titulo', 'Painel de Resultados')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Fase de resultados</h1>
                <div class="d-flex gap-2">
                    @if (auth()->user()->role === 'Admin')
                        <a href="{{ route('gerenciar_resultados.download', ['arquivo' => 'modelo.csv']) }}" class="btn btn-light">Download Arquivo Modelo</a>
                    @endif
                </div>
            </div>

            <div class="d-flex justify-content-between align-items-end mb-3">
                <form method="get" action="{{ route('gerenciar_campeonatos.filtrar') }}" class="bg-custom rounded col-12 py-3 px-4">
                    <div class="row align-items-end row-gap-4">
                        <div class="col-3 d-flex flex-wrap">
                            <label for="search" class="col-form-label">Buscar por Título:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search" name="titulo" placeholder="Ex: Campeonato Santista" value="{{ request()->input('titulo') }}">
                            </div>
                        </div>

                        <div class="col-2 d-flex flex-wrap">
                            <label for="tipo" class="col-form-label">Tipo:</label>
                            <div class="col-12">
                                <select name="tipo" class="form-control bg-dark text-light border-dark form-select" id="tipo">
                                    <option value="">Selecione</option>
                                    <option value="Kimono" {{ request()->input('tipo') == 'Kimono' ? 'selected' : '' }}>Kimono</option>
                                    <option value="No-Gi" {{ request()->input('tipo') == 'No-Gi' ? 'selected' : '' }}>No-Gi</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-3 d-flex flex-wrap">
                            <label for="estado" class="col-form-label">Estado:</label>
                            <div class="col-12">
                                <select name="estado" class="form-control bg-dark text-light border-dark form-select" id="estado">
                                    <option value="">Selecione um estado</option>
                                    @foreach ($estados as $estado)
                                        <option value="{{ $estado }}" {{ request()->input('estado') == $estado ? 'selected' : '' }}>{{ $estado }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-3 d-flex flex-wrap">
                            <label for="cidade" class="col-form-label">Cidade:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search" name="cidade" placeholder="Ex: Santos" value="{{ request()->input('cidade') }}">
                            </div>
                        </div>

                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn btn-light w-100">Filtrar</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-custom rounded overflow-hidden">
                <table class="table mb-0 table-custom table-dark align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Titulo do Campeonato</th>
                            <th scope="col" class="text-uppercase">Tipo</th>
                            <th scope="col" class="text-uppercase">Cidade</th>
                            <th scope="col" class="text-uppercase">Estado</th>
                            <th scope="col" class="text-uppercase">Status</th>
                            @if (auth()->user()->role === 'Admin')
                                <th scope="col" class="text-uppercase text-center">Enviar resultados</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campeonatos as $campeonato)
                        <tr>
                            <td>{{ $campeonato->titulo }}</td>
                            <td>{{ $campeonato->tipo }}</td>
                            <td>{{ $campeonato->cidade }}</td>
                            <td>{{ $campeonato->estado }}</td>
                            <td>{{ $campeonato->status }}</td>
                            @if (auth()->user()->role === 'Admin')
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('gerenciar_resultados.upload', $campeonato->id) }}" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                                                <path d="M7.742 1.55a.5.5 0 0 0-.484 0L1.257 6.65a.5.5 0 0 0-.093.688l1.086 1.623a.5.5 0 0 0 .825.09L8 3.132l4.325 5.828a.5.5 0 0 0 .825-.09l1.086-1.623a.5.5 0 0 0-.093-.688L8.257 1.55a.5.5 0 0 0-.484 0zM2 14.5a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 0-1H2a.5.5 0 0 0-.5.5z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $paginator->links('administrativo.layouts._components.paginator') }}

        </main>
    </div>
@endsection
