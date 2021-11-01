<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <span class="user-top-img">
                    <img alt="image" src="{{ Config::get('marrs-admin.logo') }}" class="rounded-circle mr-1">
                </span>
                <div class="d-sm-none d-lg-inline-block">Olá {{ auth('admin')->user()->name ?? '' }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item has-icon text-danger" href="{{ route('admin.logout') }}">
                    <i class="fas fa-sign-out-alt"></i> Sair
                </a>

            </div>
        </li>
    </ul>
</nav>
