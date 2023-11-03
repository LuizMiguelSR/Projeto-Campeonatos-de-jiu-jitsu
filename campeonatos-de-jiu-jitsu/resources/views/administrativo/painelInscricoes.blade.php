@extends('administrativo.layouts.layout')
@section('titulo', 'Painel de Inscrições')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex justify-content-between mb-4">
                <h1 class="h3">Inscrições</h1>

                <div class="d-flex gap-2">
                    @if (auth()->user()->role === 'Admin')
                        <a href="{{ route('gerenciar_inscricoes.download_pdf') }}" class="btn btn-light" title="PDF">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                            </svg>
                        </a>

                        <a href="{{ route('gerenciar_inscricoes.download_csv') }}" class="btn btn-light" title="Excel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-excel" viewBox="0 0 16 16">
                                <path d="M5.884 6.68a.5.5 0 1 0-.768.64L7.349 10l-2.233 2.68a.5.5 0 0 0 .768.64L8 10.781l2.116 2.54a.5.5 0 0 0 .768-.641L8.651 10l2.233-2.68a.5.5 0 0 0-.768-.64L8 9.219l-2.116-2.54z"/>
                                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>

           <div class="d-flex justify-content-between align-items-end mb-3">
                <form method="get" action="{{ route('gerenciar_inscricoes.filtrar') }}" class="bg-custom rounded col-12 py-3 px-4">
                    <div class="row align-items-end row-gap-4">
                        <div class="col-2 d-flex flex-wrap">
                            <label for="search" class="col-form-label">Buscar por Nome do Atleta:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search" name="nome" placeholder="Ex: José Silva" value="{{ request()->input('nome') }}">
                            </div>
                        </div>

                        <div class="col-2 d-flex flex-wrap">
                            <label for="tipo" class="col-form-label">Sexo:</label>
                            <div class="col-12">
                                <select name="sexo" class="form-control bg-dark text-light border-dark form-select" id="sexo">
                                    <option value="">Selecione</option>
                                    <option value="Masculino" {{ request()->input('sexo') == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="Feminino" {{ request()->input('sexo') == 'Feminino' ? 'selected' : '' }}>Feminino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-2 d-flex flex-wrap">
                            <label for="search" class="col-form-label">Buscar por Campeonato:</label>
                            <div class="col-12">
                                <input type="text" class="form-control bg-dark text-light border-dark" id="search" name="titulo" placeholder="Ex: Campeonato Santista" value="{{ request()->input('titulo') }}">
                            </div>
                        </div>

                        <div class="col-2 d-flex flex-wrap">
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
                            <th scope="col" class="text-uppercase">Nome</th>
                            <th scope="col" class="text-uppercase">Sexo</th>
                            <th scope="col" class="text-uppercase">Titulo</th>
                            <th scope="col" class="text-uppercase">Cidade</th>
                            <th scope="col" class="text-uppercase">Estado</th>
                            <th scope="col" class="text-uppercase text-center">Detalhes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($resultados as $resultado => $value)
                        <tr>
                            <td>{{ $value->nome }}</td>
                            <td>{{ $value->sexo }}</td>
                            <td>{{ $value->titulo }}</td>
                            <td>{{ $value->cidade }}</td>
                            <td>{{ $value->estado }}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button type="button" class="btn btn-light d-flex justify-content-center align-items-center rounded-circle p-2 mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $value->id}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <div class="modal fade" id="exampleModal{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered text-light">
                                <div class="modal-content bg-custom">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Inscrição</h1>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body d-flex flex-wrap row-gap-4">

                                        <div class="col-6">
                                            <div><small>Código:</small></div>
                                            <div>{{ $value->codigo }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>CPF:</small></div>
                                            <div>{{ $value->cpf }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Email:</small></div>
                                            <div>{{ $value->email }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Data Nascimento:</small></div>
                                            <div>{{ \Carbon\Carbon::parse($value->data_nascimento)->locale('pt_BR')->isoFormat('MMM') }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Equipe:</small></div>
                                            <div>{{ $value->equipe }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Faixa:</small></div>
                                            <div>{{ $value->faixa }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Peso:</small></div>
                                            <div>{{ $value->peso }}</div>
                                        </div>

                                        <div class="col-6">
                                            <div><small>Data Incrição:</small></div>
                                            <div>{{ \Carbon\Carbon::parse($value->data_inscricao)->locale('pt_BR')->isoFormat('DD/MM/YYYY') }}</div>
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

            @if ($inscricoesPage->lastPage() > 1)
                <nav aria-label="navigation">
                    <ul class="pagination justify-content-end pt-4 pb-2">
                        <li class="page-item {{ ($inscricoesPage->currentPage() == 1) ? ' disabled' : '' }}">
                            <a class="page-link bg-secondary border-dark {{ ($inscricoesPage->currentPage() == 1) ? 'link-light' : 'text-white' }}" href="{{ $inscricoesPage->url(1) }}">Primeira</a>
                        </li>
                        @for ($i = 1; $i <= $inscricoesPage->lastPage(); $i++)
                            <li class="page-item {{ ($inscricoesPage->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link bg-secondary border-dark {{ ($inscricoesPage->currentPage() == $i) ? 'link-light' : 'text-white' }}" href="{{ $inscricoesPage->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor
                        <li class="page-item {{ ($inscricoesPage->currentPage() == $inscricoesPage->lastPage()) ? ' disabled' : '' }}">
                            <a class="page-link bg-secondary border-dark {{ ($inscricoesPage->currentPage() == $inscricoesPage->lastPage()) ? 'link-light' : 'text-white' }}" href="{{ $inscricoesPage->url($inscricoesPage->currentPage()+1) }}">Próxima</a>
                        </li>
                    </ul>
                </nav>
            @endif

        </main>
    </div>
@endsection
