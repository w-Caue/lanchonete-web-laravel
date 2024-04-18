<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    @livewireStyles

    @vite('resources/css/app.css', 'resources/js/alpine/start.js')
</head>

<body>
    <div class="flex flex-col h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.ecommerce.ecommerce-nav')

        <div class="flex flex-col flex-1 w-full">
            <div class="mt-2">
                @yield('content')
            </div>
        </div>

        @include('layouts.ecommerce.ecommerce-footer')
    </div>

    @livewireScripts
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

</body>

</html>
