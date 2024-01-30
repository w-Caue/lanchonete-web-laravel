<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @livewireStyles

    @vite('resources/css/app.css', 'resources/js/alpine/start.js')
</head>

<body>
    <!-- Header -->
    <header class="">
        <nav class="p-2 flex items-center">
            <div class="flex">
                <a class="" href="/" class="">
                    <span class="text-2xl font-semibold">LancheCode</span>
                </a>

                {{-- <button class="navbar-toggler" type="button">

                </button>

                <div class="ml-4" id="">
                    <div class="flex flex-col md:flex-row ">
                        <a href="" class="font-semibold p-2 rounded hover:bg-gray-400 hover:text-white">Home</a>

                        <a href=""
                            class="font-semibold p-2 rounded hover:bg-gray-400 hover:text-white">Contatos</a>

                        <a href="" class="font-semibold p-2 rounded hover:bg-gray-400 hover:text-white">Sobre
                            Nós</a>
                    </div>
                </div> --}}

                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10 navbar-nav">
                        @auth
                            <a href="{{ route('site.pedido.index') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm ">Home</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm ">Entrar</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm ">Registrar</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>
    </header>

    @yield('content')

    @livewireScripts
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-livewire-alert::scripts />
</body>

</html>
