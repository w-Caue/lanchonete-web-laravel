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

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css', 'resources/js/alpine/start.js')
</head>

<body>
    <div id="app">
        <div class="flex h-screen" :class="{ 'overflow-hidden': isSideMenuOpen }">
            @include('layouts.sidebar')

            <div class="flex flex-col flex-1 w-full">
                {{-- @include('layouts.navbar') --}}

                <main class="h-full pb-16 overflow-y-auto">
                    <!-- Remove everything INSIDE this div to a really blank page -->
                    <div class="container px-6 mx-auto grid">
                        @yield('content')
                    </div>
                </main>
            </div>


        </div>
    </div>

    @include('sweetalert::alert')

    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

</body>

</html>
