@extends('publico.layouts.layout')
@section('titulo', 'Recuperação de Senha')
@section('conteudo')
    <main class="bg-gray-50">
        @component('publico.layouts._components.alerta_sucesso')
        @endcomponent
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="{{ route('home.inicio') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="{{ asset('imgs/logo.svg') }}" alt="logo" />
                <p id="logo">OSU BJJ</p>
            </a>
            <div class="w-full p-6 bg-white rounded-lg shadow md:mt-0 sm:max-w-md sm:p-8">
                <h2 class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Mudar senha
                </h2>
                <form method="POST" class="mt-4 space-y-4 lg:mt-5 md:space-y-5" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div>
                        <label for="senha" class="block mb-2 text-sm font-medium text-gray-900">Nova senha</label>
                        <input type="password" name="password" id="password" placeholder="**********"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="" autocomplete="new-password" />
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password-confirm" class="block mb-2 text-sm font-medium text-gray-900">Confirmar
                            senha</label>
                        <input type="password" name="password_confirmation" id="password-confirm" placeholder="**********"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5"
                            required="" autocomplete="new-password" />
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Trocar senha
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection
