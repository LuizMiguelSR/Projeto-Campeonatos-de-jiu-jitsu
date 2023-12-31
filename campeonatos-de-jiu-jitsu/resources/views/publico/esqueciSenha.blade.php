@extends('publico.layouts.layout')
@section('titulo', 'Esqueci a senha')
@section('conteudo')
    <main class="bg-gray-50">

        @component('publico.layouts._components.alerta_sucesso')
        @endcomponent
        
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-[80vh] lg:py-0">
            <a href="{{ route('home.inicio') }}" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                <img class="w-8 h-8 mr-2" src="{{ asset('imgs/logo.svg') }}" alt="logo" />
                <p id="logo">OSU BJJ</p>
            </a>
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Esqueci minha senha
                    </h1>
                    <form method="POST" class="space-y-4 md:space-y-6" action="{{ route('password.email') }}">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Seu Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5"
                                value="{{ old('email') }}" placeholder="larusso@miyagido.com" required=""
                                autocomplete="email" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
