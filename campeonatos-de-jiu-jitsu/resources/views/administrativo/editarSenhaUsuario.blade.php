@extends('administrativo.layouts.layout')
@section('titulo', 'Editar Usuário')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            @component('administrativo.layouts._components.alerta_sucesso')
            @endcomponent

            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Mudar a Senha</h1>

                <a href="{{ route('gerenciar_usuarios.inicio') }}" class="btn btn-light">Voltar</a>
            </div>

            <form method="post" action="{{ route('gerenciar_usuarios.atualizar_senha', $usuario->id) }}" class="bg-custom rounded col-12 py-3 px-4">
                @csrf

                <div class="mb-3 row">
                    <label for="senha" class="col-sm-2 col-form-label">Nova Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control bg-dark text-light border-dark" id="senha" name="password" required>
                        {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="senha" class="col-sm-2 col-form-label">Confirmar Senha:</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control bg-dark text-light border-dark" id="senha" name="password_confirmation" required>
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
