<!doctype html>
<html x-data="data()" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css', 'resources/js/alpine/start.js')
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

    @include('sweetalert::alert')

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
                isSidebarOpen: true,
                toggleSidebar() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isPessoalOpen: false,
                togglePessoalMenu() {
                    this.isPessoalOpen = !this.isPessoalOpen
                },
                // closeNotificationsMenu() {
                //     this.isNotificationsMenuOpen = false
                // },
                // isProfileMenuOpen: false,
                // toggleProfileMenu() {
                //     this.isProfileMenuOpen = !this.isProfileMenuOpen
                // },
                // closeProfileMenu() {
                //     this.isProfileMenuOpen = false
                // },
                // isPagesMenuOpen: false,
                // togglePagesMenu() {
                //     this.isPagesMenuOpen = !this.isPagesMenuOpen
                // },
                // // Modal
                // isModalOpen: false,
                // trapCleanup: null,
                // openModal() {
                //     this.isModalOpen = true
                //     this.trapCleanup = focusTrap(document.querySelector('#modal'))
                // },
                // closeModal() {
                //     this.isModalOpen = false
                //     this.trapCleanup()
                // },
            }
        }
    </script>
</body>

</html>
