<ul class="sidebar-menu">
    @foreach ($items as $item)
        <li class="menu-header">{{ $item->name }}</li>
        @if ($item->childs->count() > 0)
            @foreach ($item->childs as $child)
                <li class="nav-item {{ \Request::route()->getName() == $child->route ? 'active' : '' }} ">
                    <a href="{{ $child->route ? (Route::has($child->route) ? route($child->route) : '') : @$child->link }}"
                        class="nav-link {{ $child->childs->count() > 0 ? 'has-dropdown' : '' }}"
                        {{ $child->childs->count() > 0 ? ' data-toggle="dropdown"' : '' }}>
                        <i class="{{ $child->icon_class }}"></i>
                        <span>{{ $child->name }}</span>
                    </a>
                    @if ($child->childs->count() > 0)
                        <ul class="dropdown-menu">
                            @foreach ($child->childs as $grandchild)
                                <li><a href="{{ $grandchild->route ? (Route::has($grandchild->route) ? route($grandchild->route) : '') : @$grandchild->link }}"
                                        class="nav-link "><i
                                            class="{{ $grandchild->icon_class }}"></i><span>{{ $grandchild->name }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        @endif
    @endforeach
</ul>
