@extends('administrativo.layouts.layout')
@section('titulo', 'Enviar Resultados')
@section('conteudo')
        <main class="col h-100 text-light p-4">

            <div class="d-flex align-items-end justify-content-between mb-4">
                <h1 class="h3">Enviar Resultados</h1>

                <a href="{{ route('gerenciar_resultados.inicio') }}" class="btn btn-light">Voltar</a>
            </div>
            <form method="post" action="{{ route('gerenciar_resultados.enviar', $id) }}" enctype="multipart/form-data" class="bg-custom rounded col-12 py-3 px-4">
                @csrf
                <div class="mb-3 row">
                    <label for="nome" class="col-sm-2 col-form-label">Upload arquivo CSV:</label>
                    <div class="col-sm-10">
                        <input type="file" name="file" enctype="multipart/form-data">
                    </div>
                </div>
                {{ $errors->has('file') ? $errors->first('file') : '' }}

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-light">Enviar</button>
                </div>
            </form>

            <div class="bg-custom rounded overflow-hidden">

            </div>
        </main>
    </div>
@endsection
