@extends('administrativo.layouts.layout')
@section('titulo', 'Painel de Campeonatos')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Campeonatos</h1>

                <div class="d-flex gap-2">
                    @if (auth()->user()->role === 'Admin')
                        <a href="{{ route('gerenciar_campeonatos.novo') }}" class="btn btn-light">+ Cadastrar Campeonato</a>
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
                            <th scope="col" class="text-uppercase">Titulo</th>
                            <th scope="col" class="text-uppercase">Tipo</th>
                            <th scope="col" class="text-uppercase">Cidade</th>
                            <th scope="col" class="text-uppercase">Estado</th>
                            <th scope="col" class="text-uppercase">Fase</th>
                            @if (auth()->user()->role === 'Admin')
                                <th scope="col" class="text-uppercase text-center">Ações</th>
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
                                        <button type="button" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $campeonato->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                            </svg>
                                        </button>

                                        <a href="{{ route('gerenciar_campeonatos.editar', $campeonato->id) }}" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Editar">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                                <path fill="#141618" d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                                            </svg>
                                        </a>

                                        <form action="{{ route('gerenciar_campeonatos.excluir', $campeonato->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Botão de exclusão fora do formulário -->
                                            <button type="submit" class="btn btn-danger d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" title="Deletar">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path fill="#FFF" d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                    <path fill="#FFF" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            @endif
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $campeonato->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered text-light">
                                <div class="modal-content bg-custom">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Usuário</h1>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-wrap row-gap-4">
                                        <div class="col-6">
                                            <div><small>Título:</small></div>
                                            <div>{{ $campeonato->titulo }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Código:</small></div>
                                            <div>{{ $campeonato->codigo }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Data:</small></div>
                                            <div>{{ \Carbon\Carbon::parse($campeonato->data_realizacao)->locale('pt_BR')->isoFormat('DD/MM/YYYY') }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Tipo:</small></div>
                                            <div>{{ $campeonato->tipo }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Fase:</small></div>
                                            <div>{{ $campeonato->fase }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Status:</small></div>
                                            <div>{{ $campeonato->cidade }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>E-mail:</small></div>
                                            <div>{{ $campeonato->estado }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Status:</small></div>
                                            <div>{{ $campeonato->status }}</div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $paginator->links('administrativo.layouts._components.paginator') }}

        </main>
    </div>
@endsection
