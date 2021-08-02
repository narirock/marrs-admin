<div class="main-sidebar">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ url('/home') }}"><img src="{{ Config::get('marrs-admin.logo') }}" width="130" alt=""></a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/home') }}"><img src="{{ Config::get('marrs-admin.logo') }}" width="50" alt=""></a>
        </div>

        <x-marrs-admin-menu />

        {{-- <ul class="sidebar-menu">
            <li class="menu-header">Painel</li>
            <li class="nav-item {{ \Request::route()->getName() == 'admin.dashboard' ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link "><i
                        class="fas fa-chart-line"></i><span>Dashboard</span></a>
            </li>

            <li class="menu-header">Portal/Website</li>

            <li class="nav-item {{ strpos(URL::current(), 'sliders') ? 'active' : '' }}">
                <a href="{{ url('/admin/sliders') }}" class="nav-link "><i
                        class="fas fa-images"></i><span>Sliders</span></a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-rss"></i><span>Blog</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ strpos(URL::current(), 'categories') ? 'active' : '' }}">
                        <a href="{{ url('/admin/categories') }}" class="nav-link "><i
                                class="fas fa-tags"></i><span>Categorias</span></a>
                    </li>

                    <li class="nav-item {{ strpos(URL::current(), 'posts') ? 'active' : '' }}">
                        <a href="{{ url('/admin/posts') }}" class="nav-link "><i
                                class="fas fa-newspaper"></i><span>Posts</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                        class="fas fa-graduation-cap"></i><span>School</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ strpos(URL::current(), 'coursetypes') ? 'active' : '' }}">
                        <a href="{{ url('/admin/coursetypes') }}" class="nav-link "><i
                                class="fas fa-tags"></i><span>Tipos</span></a>
                    </li>
                    <li class="nav-item {{ strpos(URL::current(), 'teachers') ? 'active' : '' }}">
                        <a href="{{ url('/admin/teachers') }}" class="nav-link "><i
                                class="fas fa-chalkboard-teacher"></i><span>Professores</span></a>
                    </li>
                    <li class="nav-item {{ strpos(URL::current(), 'courses') ? 'active' : '' }}">
                        <a href="{{ url('/admin/courses') }}" class="nav-link "><i
                                class="fas fa-chalkboard"></i><span>Cursos</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'customers') ? 'active' : '' }}">
                <a href="{{ url('/admin/customers') }}" class="nav-link "><i class="fas fa-user"></i><span>Clientes
                    </span></a>
            </li>

            <li class="nav-item {{ strpos(URL::current(), 'testimonials') ? 'active' : '' }}">
                <a href="{{ url('/admin/testimonials') }}" class="nav-link "><i
                        class="fas fa-comment-dots"></i><span>Depoimentos</span></a>
            </li>
            <li class="nav-item {{ strpos(URL::current(), 'newsletters') ? 'active' : '' }}">
                <a href="{{ url('/admin/newsletters') }}" class="nav-link "><i
                        class="fas fa-rss"></i><span>Newsletter</span></a>
            </li>
            <!--<li class="nav-item {{ strpos(URL::current(), 'config') ? 'active' : '' }}">
                <a href="{{ url('/admin/config/geral') }}" class="nav-link "><i class="fas fa-cogs"></i><span>Configurações</span></a>
            </li>!-->
        </ul> --}}

        <div class="sidebar-brand sidebar-logo-footer">
        </div>
    </aside>
</div>
