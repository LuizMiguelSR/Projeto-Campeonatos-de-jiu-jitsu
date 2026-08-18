@extends('administrativo.layouts.layoutLogin')
@section('titulo', 'Reset Enviado')
@section('conteudo')
    <main class="py-5" style="min-height: calc(100vh - 72px);">
        @component('administrativo.layouts._components.alerta_sucesso')
        @endcomponent

        <div class="container">
            <div class="bg-custom mx-auto row col-8 rounded shadow-sm overflow-hidden">
                <div class="col-6 bg-white p-5 d-flex align-items-center justify-content-center">
                    <img src="{{ asset('imgs/kbrtec.webp') }}" alt="KBRTEC" height="200" width="200" class="object-fit-contain">
                </div>

                <div class="col-6 d-flex flex-column align-items-center p-5">
                    <h2 class="h4 text-light mb-4">Email enviado com sucesso</h2>
                    <p class="mb-4 text-light fw-light">Um email com as instruções de recuperação foi enviado para o endereço {{ $email }}</p>
                    <div class="row row-gap-3">
                        <a href="{{ route('login_administrativo.index') }}" class="link-light">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
