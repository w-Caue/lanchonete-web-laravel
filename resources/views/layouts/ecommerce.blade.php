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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @vite('resources/css/app.css')

    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    @livewireStyles
</head>

<body class="bg-gray-200">
    <div class="flex flex-col h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('layouts.ecommerce.ecommerce-nav')

        <div class="flex flex-col flex-1 w-full my-16">
            <div class="mt-2">
                @yield('content')
            </div>
        </div>

        @include('layouts.ecommerce.ecommerce-footer')
    </div>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <x-livewire-alert::scripts />

</body>

</html>
