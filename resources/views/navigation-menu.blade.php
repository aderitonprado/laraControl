<header class="p-3 mb-3 border-bottom noprint">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ url('assets/img/logo-santa-cruz.png') }}" alt="" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" :active="request()->routeIs('dashboard')" href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('supplies.index') }}" :active="request()->routeIs('supplies.index')">{{ __('Posto') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('groups.index') }}" :active="request()->routeIs('groups.index')">{{ __('Grupos') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipaments.index') }}" :active="request()->routeIs('equipaments.index')">{{ __('Equipamentos') }}</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Movimentação') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">{{ __('Requisição') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('Devolução') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('Compra') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('Sucateamento') }}</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ __('Perfil') }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">{{ __('Configurações') }}</a></li>
                            <li><a class="dropdown-item" href="#">{{ __('Perfil') }}</a></li>

                            <li class="nav-item dropdown">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                                        {{ __('Sair') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

</header>