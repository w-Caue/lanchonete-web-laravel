<!doctype html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin - @yield('title') </title>

    @livewireStyles

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>

<body class="dark">
    @include('layouts.navbar')
    <div class="flex pt-16 overflow-hidden bg-gray-50 dark:bg-gray-900">

        @include('layouts.sidebar')

        <div class="relative w-full h-screen overflow-y-auto bg-gray-50 lg:ml-64 dark:bg-gray-900">
            <main class="m-2 bg-gray-50 dark:bg-gray-900">
                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />

    <script>
        function data() {

            return {
                dark: false,

                darkMode() {
                    this.dark = !this.dark
                    if (this.dark) {
                        document.documentElement.classList.add("dark");
                    } else {
                        document.documentElement.classList.remove("dark");
                    }
                },
                isUserOpen: false,
                toggleUser() {
                    this.isUserOpen = !this.isUserOpen
                },
                isAppsMenuOpen: false,
                toggleAppsMenu() {
                    this.isAppsMenuOpen = !this.isAppsMenuOpen
                },
                isSidebarOpen: false,
                toggleSidebar() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isPessoalOpen: false,
                togglePessoalMenu() {
                    this.isPessoalOpen = !this.isPessoalOpen
                },
                isProdutoOpen: false,
                toggleProdutoMenu() {
                    this.isProdutoOpen = !this.isProdutoOpen
                },
            }
        }
    </script>

    <script src="
    https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js
    "></script>
</body>

</html>
