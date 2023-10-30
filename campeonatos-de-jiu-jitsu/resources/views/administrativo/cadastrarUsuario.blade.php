@extends('administrativo.layouts.layout')
@section('titulo', 'Cadastrar novo Usuário')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Cadastrar Usuário</h1>

                <a href="{{ route('gerenciar_usuarios.index') }}" class="btn btn-light">Voltar</a>
            </div>
            <form method="post" action="{{ route('gerenciar_usuarios.store') }}" class="bg-custom rounded col-12 py-3 px-4">
                @csrf
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Usuário:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control bg-dark text-light border-dark" id="name" name="name" placeholder="Ex: Admin" value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">E-mail:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control bg-dark text-light border-dark" id="email" name="email" placeholder="Ex: admin@kbrtec.com.br" value="{{ old('email') }}">
                        {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label">Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control bg-dark text-light border-dark" id="password">
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="confSenha" class="col-sm-2 col-form-label">Confirmar Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control bg-dark text-light border-dark" id="confSenha" name="password_confirmation">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="role" class="col-sm-2 col-form-label">Tipo:</label>
                    <div class="col-sm-10">
                        <select name="role" class="form-control bg-dark text-light border-dark form-select" id="role">
                            <option value="" disabled selected>Selecione</option>
                            <option value="1">Administrador</option>
                            <option value="2">Usuário</option>
                            <option value="3">Atleta</option>
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
    </div>
@endsection
