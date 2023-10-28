@extends('publico.layouts.layout')
@section('titulo', 'Reset de Senha')
@section('conteudo')
    <main class="bg-gray-50">
        <div
            class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-[80vh] lg:py-0"
        >
            <a
            href="{{ route('inicio') }}"
            class="flex items-center mb-6 text-2xl font-semibold text-gray-900"
            >
            <img class="w-8 h-8 mr-2" src="{{ asset('imgs/logo.svg') }}" alt="logo" />
            <p id="logo">OSU BJJ</p>
            </a>
            <div
            class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0"
            >
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1
                class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl"
                >
                Email enviado com sucesso
                </h1>
                <p class="text-sm">
                Um email com as instruções de recuperação foram enviados para o
                endereço
                <strong class="text-blue-700">lawrancejohny@cobrakai.com</strong>
                </p>
            </div>
            </div>
        </div>
    </main>
@endsection
