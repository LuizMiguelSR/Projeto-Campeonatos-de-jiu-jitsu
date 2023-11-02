<header>
    <nav class="bg-white border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap lg:flex-nowrap items-center gap-12 mx-auto p-4">
            <div class="flex items-center gap-8 w-full">
                <a href="{{ route('home.inicio') }}" class="flex items-center">
                    <img src="{{ asset('imgs/logo.svg') }}" alt="Logo" />
                    <p id="logo" class="text-2xl whitespace-nowrap">OSU BJJ</p>
                </a>
                <p class="font-bold whitespace-nowrap" id="logo2">Área do atleta</p>
            </div>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Abrir menu principal</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>

            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Abrir menu principal</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block" id="navbar-default">
                <ul class="flex flex-col lg:flex-row lg:items-center font-medium gap-4 w-full">
                    <li class="ml-auto">
                        <a href="{{ route('logout_atleta') }}"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center">
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
