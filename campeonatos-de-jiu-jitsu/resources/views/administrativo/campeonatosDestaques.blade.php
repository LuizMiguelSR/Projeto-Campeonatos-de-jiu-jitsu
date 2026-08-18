@extends('administrativo.layouts.layout')
@section('titulo', 'Painel de Campeonatos')
@section('conteudo')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <main class="col h-100 text-light p-4">


        @component('administrativo.layouts._components.alerta_sucesso')
        @endcomponent

        <div class="d-flex justify-content-between mb-4">
            <h1 class="h3">Campeonatos em destaque - Clique e arraste para definir a ordem</h1>
        </div>

        <div class="d-flex justify-content-between align-items-end mb-3">
            <form method="get" action="{{ route('gerenciar_campeonatos.filtrar') }}"
                class="bg-custom rounded col-12 py-3 px-4">
                <div class="row align-items-end row-gap-4">
                    <div class="col-3 d-flex flex-wrap">
                        <label for="search" class="col-form-label">Buscar por Título:</label>
                        <div class="col-12">
                            <input type="text" class="form-control bg-dark text-light border-dark" id="search"
                                name="titulo" placeholder="Ex: Campeonato Santista"
                                value="{{ request()->input('titulo') }}">
                        </div>
                    </div>

                    <div class="col-2 d-flex flex-wrap">
                        <label for="tipo" class="col-form-label">Tipo:</label>
                        <div class="col-12">
                            <select name="tipo" class="form-control bg-dark text-light border-dark form-select"
                                id="tipo">
                                <option value="">Selecione</option>
                                <option value="Kimono" {{ request()->input('tipo') == 'Kimono' ? 'selected' : '' }}>Kimono
                                </option>
                                <option value="No-Gi" {{ request()->input('tipo') == 'No-Gi' ? 'selected' : '' }}>No-Gi
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-3 d-flex flex-wrap">
                        <label for="estado" class="col-form-label">Estado:</label>
                        <div class="col-12">
                            <select name="estado" class="form-control bg-dark text-light border-dark form-select"
                                id="estado">
                                <option value="">Selecione um estado</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado }}"
                                        {{ request()->input('estado') == $estado ? 'selected' : '' }}>{{ $estado }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-3 d-flex flex-wrap">
                        <label for="cidade" class="col-form-label">Cidade:</label>
                        <div class="col-12">
                            <input type="text" class="form-control bg-dark text-light border-dark" id="search"
                                name="cidade" placeholder="Ex: Santos" value="{{ request()->input('cidade') }}">
                        </div>
                    </div>

                    <div class="col d-flex justify-content-end">
                        <button type="submit" class="btn btn-light w-100">Filtrar</button>
                    </div>
                </div>
            </form>
        </div>
        <form method="post" action="{{ route('gerenciar_campeonatos.destaques_salvar') }}">
            @csrf
            <div class="row bg-custom rounded overflow-hidden">
                <table id="sortable-table" class="table mb-0 table-custom table-dark align-middle">
                    <thead>
                        <tr>
                            <th scope="col" class="text-uppercase">Ordem</th>
                            <th scope="col" class="text-uppercase">Titulo</th>
                            <th scope="col" class="text-uppercase">Tipo</th>
                            <th scope="col" class="text-uppercase">Cidade</th>
                            <th scope="col" class="text-uppercase">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campeonatos as $campeonato)
                            <tr>
                                <td><input type="hidden" name="ordem[]" value="{{ $campeonato->id }}">
                                    {{ $campeonato->id }}
                                </td>
                                <td>{{ $campeonato->titulo }}</td>
                                <td>{{ $campeonato->tipo }}</td>
                                <td>{{ $campeonato->cidade }}</td>
                                <td>{{ $campeonato->estado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <button id="button" type="submit" class="btn btn-light mt-3">Salvar Ordem</button>
            </div>
        </form>

        <script>
            $(document).ready(function () {
                // Inicialize a tabela como ordenável usando jQuery UI
                console.log("Iniciando ordenação");
                $("#sortable-table tbody").sortable({
                    update: function (event, ui) {
                        console.log("Ordenação atualizada");
                    }
                });
                $("#sortable-table tbody").disableSelection();
            });
        </script>

    </main>
    </div>
@endsection
