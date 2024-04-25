<!doctype html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LancheCode</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @vite('resources/css/app.css', 'resources/js/alpine/start.js')

    @livewireStyles
</head>

<body>
    <div>
        @include('layouts.ecommerce.ecommerce-navbar')

        <div class="mt-40">
            @yield('content')
        </div>

        @include('layouts.ecommerce.ecommerce-footer')
    </div>

    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

</body>

<script>
    function data() {

        return {
            openCarrinho: false,
            openUser: false,
        }
    }
</script>

</html>
