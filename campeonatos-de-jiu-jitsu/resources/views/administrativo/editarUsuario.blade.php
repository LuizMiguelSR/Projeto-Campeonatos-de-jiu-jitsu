@extends('administrativo.layouts.layout')
@section('titulo', 'Editar Usuário')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Editar Usuário</h1>

                <a href="{{ route('gerenciar_usuarios.inicio') }}" class="btn btn-light">Voltar</a>
            </div>

            <form method="post" action="{{ route('gerenciar_usuarios.atualizar', $usuario->id) }}" class="bg-custom rounded col-12 py-3 px-4">
                @csrf
                <div class="mb-3 row">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuário:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="usuario" name="name" value="{{ $usuario->name }}" required>
                        {{ $errors->has('name') ? $errors->first('name') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control bg-dark text-light border-dark" id="email" name="email" value="{{ $usuario->email }}" required>
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="role" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                        <select name="role" class="form-control bg-dark text-light border-dark form-select" id="role">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Admin">Administrador</option>
                            <option value="User">Usuário</option>
                        </select>
                        {{ $errors->has('role') ? $errors->first('role') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label">Status:</label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control bg-dark text-light border-dark form-select" id="status">
                            <option value="" disabled selected>Selecione</option>
                            <option value="Ativado">Ativado</option>
                            <option value="Desativado">Desativado</option>
                        </select>
                        {{ $errors->has('status') ? $errors->first('status') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="senha" class="col-sm-2 col-form-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control bg-dark text-light border-dark" id="senha" name="password" required>
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Salvar</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>
    </div>
@endsection
