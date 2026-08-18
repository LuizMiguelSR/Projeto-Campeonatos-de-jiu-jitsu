@extends('administrativo.layouts.layout')
@section('titulo', 'Painel de Chaveamentos')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Chaveamentos</h1>
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
                            <th scope="col" class="text-uppercase">Titulo</th>
                            <th scope="col" class="text-uppercase">Tipo</th>
                            <th scope="col" class="text-uppercase">Cidade</th>
                            <th scope="col" class="text-uppercase">Estado</th>
                            <th scope="col" class="text-uppercase">Fase</th>
                            @if (auth()->user()->role === 'Admin')
                                <th scope="col" class="text-uppercase text-center">Gerar Chaveamentos</th>
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
                            <td>{{ $campeonato->fase }}</td>
                            @if (auth()->user()->role === 'Admin')
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('gerenciar_chaveamentos.gerarChaves', $campeonato->id) }}" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Gerar Chaves">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-boxing-glove" viewBox="0 0 16 16">
                                                <path fill="#141618" d="M2.75 4.5a.5.5 0 0 1 1 0V7h.5c.107 0 .21.028.3.08L8.34 3.92a.5.5 0 0 1 .34-.13H12a1 1 0 0 1 0 2H9.36l1.03-2.06a1 1 0 0 1 1.79-.07L15 6.5a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V4.08l-3.354 6.708a1 1 0 0 1-1.791.072L.58 6.22a.5.5 0 0 1 0-.707L1.29 4.5h-.54a.5.5 0 0 1 0-1h.5a.5.5 0 0 1 .5.5z"/>
                                                <path fill="#141618" d="M1.99 12.79a1 1 0 0 1 1.412 0L5 14.586V11.5a1 1 0 0 1 2 0V14h4V9.5a1 1 0 0 1 2 0V14h2a1 1 0 0 1 1 1v.501a1 1 0 0 1-1.447.895l-4-2a1 1 0 0 1-.553-.895V12h-2v2.5a1 1 0 0 1-2 0V12H2.414l-1.707 1.707a1 1 0 0 1-1.415-1.418z"/>
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
