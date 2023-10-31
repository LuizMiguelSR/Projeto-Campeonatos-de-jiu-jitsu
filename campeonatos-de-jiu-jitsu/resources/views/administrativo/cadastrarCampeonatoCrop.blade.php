@extends('administrativo.layouts.layout')
@section('titulo', 'Cadastrar novo Campeonato')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Cadastrar Campeonato</h1>

                <a href="{{ route('gerenciar_campeonatos.index') }}" class="btn btn-light">Voltar</a>
            </div>

            <form method="post" action="{{ route('gerenciar_campeonatos.crop') }}" class="bg-custom rounded col-12 py-3 px-4">
                @csrf

                <div class="d-flex align-items-end justify-content-between mb-4">
                    <h1 class="h3 mb-3">Ajustar a Imagem</h1>
                </div>

                <div class="d-flex flex-column align-items-center justify-content-center mb-4">
                    <img src="{{ asset('images/'.$dados['imagem']) }}" id="imagem-cortar" style="max-width:100%;">
                </div>

                <input type="hidden" id="x" name="x">
                <input type="hidden" id="y" name="y">
                <input type="hidden" id="w" name="w">
                <input type="hidden" id="h" name="h">

                <div class="d-flex align-items-end justify-content-between mb-4">
                    <h1 class="h3">Confira os Dados</h1>
                </div>

                <div class="mb-3 row">
                    <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="titulo" name="titulo" placeholder="Ex: Campeonato Regional Santista 2023" value="{{ $dados['titulo'] }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="codigo" name="codigo" placeholder="Ex: 24548796" value="{{ $dados['codigo'] }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="cidade" name="cidade" placeholder="Ex: Santos" value="{{ $dados['cidade'] }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="estado" name="estado" placeholder="Ex: São Paulo" value="{{ $dados['estado'] }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="data_realizacao" class="col-sm-2 col-form-label">Data de Realização:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control bg-dark text-light border-dark" id="data_realizacao" name="data_realizacao" placeholder="Ex: 30/11/2023" value="{{ $dados['data_realizacao'] }}" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="sobre_evento">Sobre o Evento:</label>
                    <textarea name="sobre_evento" id="sobre_evento" class="ckeditor" rows="5">{{ $dados['sobre_evento'] }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="ginasio">Ginásio:</label>
                    <textarea name="ginasio" id="ginasio" class="ckeditor" rows="5">{{ $dados['ginasio'] }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="informacoes_gerais">Informações Gerais:</label>
                    <textarea name="informacoes_gerais" id="informacoes_gerais" class="ckeditor" rows="5">{{ $dados['informacoes_gerais'] }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="entrada_publico">Entrada Público:</label>
                    <textarea name="entrada_publico" id="entrada_publico" class="ckeditor" rows="5">{{ $dados['entrada_publico'] }}</textarea>
                </div>

                <div class="mb-3 row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                        <select name="tipo" class="form-control bg-dark text-light border-dark form-select" id="tipo">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Kimono" {{ $dados['tipo'] == 'Kimono' ? 'selected' : '' }}>Kimono</option>
                            <option value="No-Gi" {{ $dados['tipo'] == 'No-Gi' ? 'selected' : '' }}>No-Gi</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fase" class="col-sm-2 col-form-label">Fase:</label>
                    <div class="col-sm-10">
                        <select name="fase" class="form-control bg-dark text-light border-dark form-select" id="fase">
                            <option value="" disabled selected>Selecione</option>
                            <option value="incricao" {{ $dados['fase'] == 'incricao' ? 'selected' : '' }}>Inscrições Abertas</option>
                            <option value="chaveamento" {{ $dados['fase'] == 'chaveamento' ? 'selected' : '' }}>Chaveamento</option>
                            <option value="resultado" {{ $dados['fase'] == 'resultado' ? 'selected' : '' }}>Resultado</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control bg-dark text-light border-dark form-select" id="status">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Ativo" {{ $dados['status'] == 'Ativo' ? 'selected' : '' }}>Ativo</option>
                            <option value="Inativo" {{ $dados['status'] == 'Inativo' ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Cadastrar Campeonato</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>

        <script>
            CKEDITOR.replace('ckeditor');
        </script>

        <script>
            $(function() {
                $('#imagem-cortar').Jcrop({
                    setSelect: [0, 0, 200, 100],
                    onSelect: updateCoords,
                    onChange: updateCoords
                });
            });

            function updateCoords(c) {
                $('#x').val(c.x);
                $('#y').val(c.y);
                $('#w').val(c.w);
                $('#h').val(c.h);
            };
        </script>
    </div>
@endsection
