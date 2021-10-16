<div class="main-sidebar">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand">
            <a href="{{ url('/admin/') }}"><img src="{{ Config::get('marrs-admin.logo') }}" width="130" alt=""></a>
        </div>

        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/admin/') }}"><img src="{{ Config::get('marrs-admin.logo') }}" width="50" alt=""></a>
        </div>

        <x-marrs-admin-menu />

        <div class="sidebar-brand sidebar-logo-footer">
        </div>
    </aside>
</div>
