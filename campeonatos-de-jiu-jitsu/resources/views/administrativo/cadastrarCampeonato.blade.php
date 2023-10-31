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

            <form method="post" action="{{ route('gerenciar_campeonatos.store') }}" class="bg-custom rounded col-12 py-3 px-4" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 row">
                    <label for="titulo" class="col-sm-2 col-form-label">Título:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="titulo" name="titulo" placeholder="Ex: Campeonato Regional Santista 2023" value="{{ old('titulo') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="codigo" class="col-sm-2 col-form-label">Código:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="codigo" name="codigo" placeholder="Ex: 24548796" value="{{ old('codigo') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="titulo" class="col-sm-2 col-form-label">Imagem:</label>
                    <div class="col-sm-10">
                        <input type="file" name="imagem" accept="image/*">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="cidade" class="col-sm-2 col-form-label">Cidade:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="cidade" name="cidade" placeholder="Ex: Santos" value="{{ old('cidade') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="estado" class="col-sm-2 col-form-label">Estado:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="estado" name="estado" placeholder="Ex: São Paulo" value="{{ old('estado') }}" required>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="data_realizacao" class="col-sm-2 col-form-label">Data de Realização:</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control bg-dark text-light border-dark" id="data_realizacao" name="data_realizacao" placeholder="Ex: 30/11/2023" value="{{ old('data_realizacao') }}" required>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="sobre_evento">Sobre o Evento:</label>
                    <textarea name="sobre_evento" id="sobre_evento" class="ckeditor" rows="5">{{ old('sobre_evento') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="ginasio">Ginásio:</label>
                    <textarea name="ginasio" id="ginasio" class="ckeditor" rows="5">{{ old('ginasio') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="informacoes_gerais">Informações Gerais:</label>
                    <textarea name="informacoes_gerais" id="informacoes_gerais" class="ckeditor" rows="5">{{ old('informacoes_gerais') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="entrada_publico">Entrada Público:</label>
                    <textarea name="entrada_publico" id="entrada_publico" class="ckeditor" rows="5">{{ old('entrada_publico') }}</textarea>
                </div>

                <div class="mb-3 row">
                    <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                        <select name="tipo" class="form-control bg-dark text-light border-dark form-select" id="tipo">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Kimono">Kimono</option>
                            <option value="No-Gi">No-Gi</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="fase" class="col-sm-2 col-form-label">Fase:</label>
                    <div class="col-sm-10">
                        <select name="fase" class="form-control bg-dark text-light border-dark form-select" id="fase">
                            <option value="" disabled selected>Selecione</option>
                            <option value="incricao">Inscrições Abertas</option>
                            <option value="chaveamento">Chaveamento</option>
                            <option value="resultado">Resultado</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control bg-dark text-light border-dark form-select" id="status">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Cadastrar</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>
        <script>
            CKEDITOR.replace('ckeditor');
        </script>
    </div>
@endsection
