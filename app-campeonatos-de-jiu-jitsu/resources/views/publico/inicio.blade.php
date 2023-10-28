@extends('publico.layouts.layout')
@section('titulo', 'Início')
@section('conteudo')
    <main class="bg-gray-50">
        <section aria-labelledby="banner_title" class="h-[600px] relative">
            <img
            src="imgs/banner.jpg"
            alt="Crianças lutando jiu jitsu brasileiro"
            class="w-full h-full object-cover"
            />
            <div class="grid bg-black/70 absolute inset-0 place-items-center">
            <h1
                class="text-5xl leading-snug text-white text-center font-normal uppercase"
                id="banner_title"
            >
                O maior site de torneios
                <span class="block"> de BJJ do Brasil </span>
                <span class="block">
                Leia, se increva e
                <strong class="font-bold text-blue-700 underline">lute</strong>
                </span>
            </h1>
            </div>
        </section>
        <section aria-labelledby="destaques_titulo" class="py-12">
            <h2
            class="font-bold text-center text-3xl uppercase"
            id="destaques_titulo"
            >
            Torneios em destaque
            </h2>
            <div
            class="max-w-7xl mx-2 lg:mx-auto mt-6 flex flex-col lg:flex-row gap-4"
            >
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/torneio-card.jpg"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>21</p>
                    <p>NOV</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-yellow-600 px-3 text-white rounded-xl"
                >
                    Chaveamento
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Campeonato regional santista 2023
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    Kimono
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    Santos-SP
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/torneio-infantil.jpg"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>15</p>
                    <p>JAN</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-green-600 px-3 text-white rounded-xl"
                >
                    Inscrições abertas
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Torneio Estadual Infantil 2024
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    Kimono
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    São Paulo-SP
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/maia.webp"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>23</p>
                    <p>OUT</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-blue-700 px-3 text-white rounded-xl"
                >
                    Classificação
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Maia Championship nacional 2023
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    No GI
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    Rio de Janeiro-RJ
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/torneio-card.jpg"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>21</p>
                    <p>NOV</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-yellow-600 px-3 text-white rounded-xl"
                >
                    Chaveamento
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Campeonato regional santista 2023
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    Kimono
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    Santos-SP
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            </div>
        </section>
        <section aria-labelledby="torneios_titulo" class="py-12">
            <h2
            class="font-bold text-center text-3xl uppercase"
            id="torneios_titulo"
            >
            Demais competições
            </h2>
            <div
            class="max-w-7xl mx-2 lg:mx-auto mt-6 flex flex-col lg:flex-row gap-4"
            >
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/torneio-card.jpg"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>21</p>
                    <p>NOV</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-yellow-600 px-3 text-white rounded-xl"
                >
                    Chaveamento
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Campeonato regional santista 2023
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    Kimono
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    Santos-SP
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/torneio-infantil.jpg"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>15</p>
                    <p>JAN</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-green-600 px-3 text-white rounded-xl"
                >
                    Inscrições abertas
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Torneio Estadual Infantil 2024
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    Kimono
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    São Paulo-SP
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/maia.webp"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>23</p>
                    <p>OUT</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-blue-700 px-3 text-white rounded-xl"
                >
                    Classificação
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Maia Championship nacional 2023
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    No GI
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    Rio de Janeiro-RJ
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            <article
                class="relative w-full rounded-xl overflow-hidden shadow-xl p-2 outline outline-1 outline-gray-400 text-gray-900 hover:-translate-y-2 transition-transform duration-300"
            >
                <img
                src="imgs/torneio-card.jpg"
                alt="Imagem do torneio"
                class="rounded-md w-full h-[200px] object-cover"
                />
                <div class="p-3 relative">
                <div
                    class="absolute -top-14 bg-white px-4 py-2 rounded-md shadow-md shadow-gray-500 text-center"
                >
                    <p class="text-2xl font-bold" data-calendar>21</p>
                    <p>NOV</p>
                </div>
                <p
                    class="absolute -top-3 left-24 bg-yellow-600 px-3 text-white rounded-xl"
                >
                    Chaveamento
                </p>
                <h3 class="mt-4 uppercase text-xl min-h-[60px]">
                    Campeonato regional santista 2023
                </h3>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 6h.008v.008H6V6z"
                    />
                    </svg>
                    Kimono
                </p>
                <p class="text-gray-400 flex gap-2 my-2">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6"
                    >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"
                    />
                    </svg>
                    Santos-SP
                </p>
                </div>
                <a
                href="./integra.html"
                title="Saiba mais sobre Campeonato regional santista 2023"
                class="absolute inset-0"
                ></a>
            </article>
            </div>
            <p class="mt-4 max-w-7xl mx-auto flex justify-center md:justify-end">
            <a
                href="#"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            >
                Ver todas as competições
                <svg
                class="w-3.5 h-3.5 ml-2"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 14 10"
                >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                />
                </svg>
            </a>
            </p>
        </section>
    </main>
@endsection
