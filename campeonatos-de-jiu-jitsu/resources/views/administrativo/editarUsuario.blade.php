@extends('administrativo.layouts.layout')
@section('titulo', 'Editar Usuário')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Editar Usuário</h1>

                <a href="{{ route('gerenciar_usuarios.index') }}" class="btn btn-light">Voltar</a>
            </div>

            <form method="post" action="{{ route('gerenciar_usuarios.update', $usuario->id) }}" class="bg-custom rounded col-12 py-3 px-4">
                @csrf
                @method('PATCH')
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
