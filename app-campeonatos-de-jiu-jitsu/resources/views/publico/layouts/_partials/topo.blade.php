<header>
    <nav class="bg-white border-gray-200">
        @guest
            <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
            >
                <a href="{{ route('inicio') }}" class="flex items-center">
                    <img src="{{ asset('imgs/logo.svg') }}" alt="Logo" />
                    <p id="logo">OSU BJJ</p>
                </a>
                <button
                    data-collapse-toggle="navbar-default"
                    type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-default"
                    aria-expanded="false"
                >
                    <span class="sr-only">Abrir menu principal</span>
                    <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                    >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:items-center md:space-x-8 md:mt-0 md:border-0 md:bg-white"
                    >
                        <li>
                            <a
                            href="{{ route('inicio') }}"
                            class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0"
                            aria-current="page"
                            >Início</a
                            >
                        </li>
                        <li>
                            <a
                            href="#"
                            class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0"
                            >Torneios</a
                            >
                        </li>
                        <li>
                            <a
                            href="{{ route('login_atleta') }}"
                            class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center"
                            >
                            Área do competidor
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div
                class="max-w-screen-xl flex flex-wrap lg:flex-nowrap items-center gap-12 mx-auto p-4"
            >
                <div class="flex items-center gap-8 w-full">
                    <a href="{{ route('inicio') }}" class="flex items-center">
                        <img src="{{ asset('imgs/logo.svg') }}" alt="Logo" />
                        <p id="logo" class="text-2xl whitespace-nowrap">OSU BJJ</p>
                    </a>
                    <p class="font-bold whitespace-nowrap" id="logo">Área do atleta</p>
                </div>

                <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default"
                aria-expanded="false"
                >
                <span class="sr-only">Abrir menu principal</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
                </button>

                <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-default"
                aria-expanded="false"
                >
                <span class="sr-only">Abrir menu principal</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
                </button>
                <div class="hidden w-full md:block" id="navbar-default">
                    <ul
                        class="flex flex-col lg:flex-row lg:items-center font-medium gap-4 w-full"
                    >
                        <li class="ml-auto">
                        <a
                            href="{{ route('logout') }}"
                            class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-6 py-2.5 text-center"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                        >
                            Sair
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </li>
                    </ul>
                </div>
            </div>
        @endguest
    </nav>
</header>


