<!doctype html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

    @livewireStyles

    @vite('resources/css/app.css')
</head>

<body class="dark">
    <div class="flex flex-col h-screen bg-gray-100 dark:bg-gray-900">

        @include('layouts.navbar')

        <div class="flex flex-row h-full w-full gap-1 overflow-hidden">
            @include('layouts.sidebar')

            <main class="w-full h-full overflow-y-auto">
                <div class="container flex flex-col mx-auto p-4">
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
