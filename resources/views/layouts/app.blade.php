<!doctype html>
<html  lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ isDarkMode: localStorage.getItem('dark') === 'true' }"
    x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))" x-bind:class="{ 'dark': isDarkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

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

<body x-data="data()">

    <div class="flex h-screen bg-neutral-200 dark:bg-gray-900">

        @include('layouts.sidebar')

        <div class="flex flex-col flex-1 ">
            @include('layouts.navbar')
            <main class="h-full w-full pb-16 mt-10">

                <div class="px-6 sm:mx-auto xl:mx-9">
                    @yield('content')
                </div>
            </main>
        </div>

    </div>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

</body>
<script>
    function data() {
        return {
            sidebar: {
                full: false,
                navOpen: false
            },
            tooltip: {
                show: false,
                visibleClass: 'block sm:absolute  sm:border border-gray-500 left-16 sm:text-sm sm:bg-gray-800 sm:px-2 sm:py-1 sm:rounded'
            },
            dropdown: {
                open: false,
                toggle(tap) {
                    this.open = !this.open;
                },
                expandedClass: 'border-gray-400 ml-4 pl-4',
                shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-gray-800 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-36'
            }
        }
    }
</script>

</html>
