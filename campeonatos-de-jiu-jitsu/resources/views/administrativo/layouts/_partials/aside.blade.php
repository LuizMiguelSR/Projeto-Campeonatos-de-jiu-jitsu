<div class="d-flex" style="min-height: calc(100vh - 76px - 72px);">
    <aside class="bg-custom text-light py-4" style="width: 250px;">
        <div class="menu">

            <div class="item">
                <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    Usuários
                </div>
                <div class="collapse show" id="menu-usuario">
                    <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                        <a href="{{ route('gerenciar_usuarios.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_usuarios.inicio') ? 'active' : '' }}">
                            <small class="d-flex justify-content-between align-items-center">
                                Listar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </small>
                        </a>
                        @if (auth()->user()->role === 'Admin')
                            <a href="{{ route('gerenciar_usuarios.novo') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_usuarios.novo') ? 'active' : '' }}">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="item">
                <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario2" aria-expanded="true" aria-controls="menu-usuario">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                    </svg>
                    Campeonatos
                </div>
                <div class="collapse show" id="menu-usuario2">
                    <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                        <a href="{{ route('gerenciar_campeonatos.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_campeonatos.inicio') ? 'active' : '' }}">
                            <small class="d-flex justify-content-between align-items-center">
                                Listar
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            </small>
                        </a>
                        @if (auth()->user()->role === 'Admin')
                            <a href="{{ route('gerenciar_campeonatos.novo') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_campeonatos.novo') ? 'active' : '' }}">
                                <small class="d-flex justify-content-between align-items-center">
                                    Cadastrar
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                            <a href="{{ route('gerenciar_campeonatos.destaques') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_campeonatos.destaques') ? 'active' : '' }}">
                                <small class="d-flex justify-content-between align-items-center">
                                    Destaques
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                            <a href="{{ route('gerenciar_inscricoes.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_inscricoes.inicio') ? 'active' : '' }}">
                                <small class="d-flex justify-content-between align-items-center">
                                    Inscrições
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                            <a href="{{ route('gerenciar_chaveamentos.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_chaveamentos.inicio') ? 'active' : '' }}">
                                <small class="d-flex justify-content-between align-items-center">
                                    Chaveamentos
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                            <a href="{{ route('gerenciar_resultados.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('gerenciar_resultados.inicio') ? 'active' : '' }}">
                                <small class="d-flex justify-content-between align-items-center">
                                    Resultados
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </small>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <a href="{{ route('logout_administrativo') }}" class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 ms-1 icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(-.125rem, 0, 0);">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                    <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                </svg>

                Sair
            </a>
        </div>
    </aside>
