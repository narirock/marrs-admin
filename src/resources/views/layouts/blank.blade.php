<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fbb900">
    @yield('meta')
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ env('APP_URL') }}/site/img/favicon.png">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('vendor/marrs-admin/css/estilo.css') }}" rel="stylesheet">
    @yield("styles")

</head>

<body class="login">

    @yield('content')

    <script src="{{ asset('vendor/marrs-admin/js/backend.js') }}" defer></script>

    <script src="{{ asset('vendor/marrs-admin/js/main.js') }}" defer></script>
</body>

</html>
