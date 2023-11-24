<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lanchonete</title>

    @vite('resources/css/app.css', 'resources/js/alpine/start.js')
</head>

<body>
    <header class="">
        <nav class="p-2 flex items-center bg-blue-600">
            <div class="flex">
                <a class="" href="#" class="">
                    <span class="text-2xl font-semibold text-white">Lanchonete</span>
                </a>

                <button class="navbar-toggler" type="button">
                    
                </button>

                <div class="ml-4" id="">
                    <div class="flex flex-col md:flex-row ">
                        <a href="" class="font-semibold p-2 rounded text-white">Home</a>

                        <a href="" class="font-semibold p-2 rounded text-white">Contatos</a>

                        <a href="" class="font-semibold p-2 rounded text-white">Sobre Nós</a>
                    </div>
                </div>

                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10 navbar-nav">
                        @auth
                            <a href="{{ route('site.pedido.index') }}"
                                class="font-semibold text-white hover:text-gray-300 focus:outline focus:outline-2 focus:rounded-sm ">Home</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-white hover:text-gray-300 focus:outline focus:outline-2 focus:rounded-sm ">Entrar</a>

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

    <main>

        <section class="bg-white dark:bg-gray-200">
            <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
                <div class="flex flex-col justify-center">
                    <h1
                        class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl">
                        Sua Lanchonete</h1>
                    <p class="mb-8 text-lg font-normal text-gray-700 lg:text-xl dark:text-gray-400">Lorem ipsum dolor
                        sit
                        amet consectetur adipisicing elit. Eum quia dolores aliquid aut odit. Temporibus aspernatur est
                        eaque repellat officia eum esse labore </p>
                    <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('site.pedido.index') }}"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                            Crie Seu Pedidos
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100">
                            Learn more
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </main>
</body>

</html>
