<footer class="bg-white rounded-lg shadow max-w-7xl m-4 md:mx-auto md:mt-4 outline outline-1 outline-gray-300">
    @guest
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
            <span class="text-sm text-gray-500 sm:text-center">© {{ date('Y') }} <a href="{{ route('home.inicio') }}"
                    class="hover:underline">OSU BJJ</a>. Todos os
                direitos reservados.
            </span>
            <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 sm:mt-0">
                <li>
                    <a href="{{ route('home.inicio') }}" class="mr-4 hover:underline md:mr-6">Início</a>
                </li>
                <li>
                    <a href="{{ route('home.torneios') }}" class="mr-4 hover:underline md:mr-6">Torneios</a>
                </li>
                <li>
                    <a href="{{ route('login_atleta') }}" class="mr-4 hover:underline md:mr-6">Área do competidor</a>
                </li>
                <li>
                    <a href="#" class="mr-4 hover:underline md:mr-6">Política de privacidade</a>
                </li>
            </ul>
        </div>
    @else
        <p class="text-sm text-gray-500 text-center py-2">
            © {{ date('Y') }} <a href="{{ route('home.inicio') }}" class="hover:underline">OSU BJJ</a>. Todos os
            direitos reservados.
        </p>
    @endguest
</footer>
