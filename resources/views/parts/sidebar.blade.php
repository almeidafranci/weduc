<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}"><i class="icon-speedometer"></i> Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('program') }}"><i class="fa fa-code"></i> Programar</a>
            </li>
            @role('admin')
                <li class="nav-title">
                    Administrador
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-puzzle"></i> Linguagens</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('languages') }}"><i class="icon-puzzle"></i> Todas as Linguagens</a>
                        </li>
                    </ul>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('languages.by-user') }}">
                                <i class="icon-puzzle"></i> Minhas Linguagens
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('languages.create') }}">
                                <i class="icon-puzzle"></i> Submeter Linguagem
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="divider"></li>
            @endrole
            <li class="nav-item mt-auto">
                <a class="nav-link nav-link-success" href="http://github.com" target="_top"><i class="fa fa-leanpub"></i> Veja nossos tutoriais</a>
            </li>

        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
