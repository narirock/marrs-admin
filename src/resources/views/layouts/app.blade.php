<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="register" content="{{ Auth::id() }}">
    <meta property="application" content="{{ env('SOCKET_APP') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="icon" href="{{ Config::get('marrs-admin.favicon') }}">
    <title>{{ env('APP_NAME') }} | Painel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link href="{{ asset('vendor/marrs-admin/css/estilo.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/marrs-admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/marrs-admin/css/datatable.css') }}" rel="stylesheet">

    @stack("styles")

</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('marrs-admin::layouts.components.topmenu')

            @include('marrs-admin::layouts.components.menu')
            <!-- Main Content -->
            <div class="main-content">
                <div class="flex-center position-ref full-height">
                    <section class="section dashboard-section">
                        <div class="section-header">
                            @yield('title')
                        </div>
                        @yield('content')
                    </section>
                </div>


                <footer class="main-footer">
                    <div class="text-center">
                        <p><?php echo date('Y'); ?>&copy;
                            <strong>{{ env('APP_NAME') }}.</strong> Todos os direitos reservados.
                            Desenvolvido por
                            <strong> <a href="https://www.marrs.com.br" target="_blank">Marrs Studio</a></strong>.
                        </p>
                    </div>
                </footer>
            </div>
        </div>

        @stack('modals')

        @stack('vue')
        <script src="{{ asset('vendor/marrs-admin/js/backend.js') }}" defer></script>
        <script src="{{ asset('vendor/marrs-admin/js/datatable.js') }}" defer></script>
        <script src="{{ asset('vendor/marrs-admin/js/main.js') }}" defer></script>
        @stack('scripts')


</body>

</html>
