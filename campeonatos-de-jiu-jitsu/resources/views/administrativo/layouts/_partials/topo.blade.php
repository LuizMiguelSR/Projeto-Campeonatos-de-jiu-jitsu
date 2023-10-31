<header class="bg-light py-2 shadow">
    <div class="container-fluid">
        <div class="row">
            <div style="width: 250px;">
                <img src="{{ asset('imgs/kbrtec.webp') }}" alt="KBRTEC" height="60" width="150" class="object-fit-contain">
            </div>

            <div class="col dropdown d-flex align-items-center justify-content-end">
                <div class="d-flex align-items-center dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Bem vindo {{ Auth::user()->name }} !

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill ms-2" viewBox="0 0 16 16">
                        <path fill="#6c757D"  d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
                    </svg>
                </div>

                <ul class="dropdown-menu">
                    <li>
                        <a class="dropdown-item text-end" href="#">
                            <small>Alterar Senha</small>
                        </a>
                        <a class="dropdown-item text-end" href="{{ route('logout_administrativo') }}">
                            <small>Sair</small>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
