<div x-cloak class=" flex justify-between">

    <div class="h-screen z-50 flex-shrink-0 bg-white transition-all duration-300 space-y-2 fixed"
        x-bind:class="{
            'w-80': !sidebar.full,
            'top-0 right-0': sidebar
                .open,
            'top-0 -right-80': !sidebar.open
        }">

        <!-- {{-- sidebar Toggle --}} -->
        <button x-on:click="sidebar.open = !sidebar.open" class="absolute right-5 m-2 text-purple-600">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                class="w-7 h-7">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>

        </button>

        <div class="m-6">
            <div class="flex flex-col mt-10">
                @if (Route::has('login'))
                    <div class="p-4 text-right">
                        @auth
                            <button
                                class="flex p-1 text-sm text-start text-gray-600 font-semibold transition duration-300 cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-purple-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                <div>
                                    <p>Bem vindo(a) : ) </p>
                                    <p class="text-lg text-left text-purple-700">
                                        {{ auth()->user()->nome }}
                                    </p>
                                </div>

                            </button>
                        @else
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-purple-700">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>

                                <a href="{{ route('login') }}"
                                    class="font-semibold text-start text-gray-700 hover:text-gray-900">
                                    <span>Bem vindo : ) </span><br>
                                    <p class="text-left text-purple-700">Entre <span class="text-gray-700">ou</span>
                                        cadastre-se
                                    </p>

                                </a>
                            </div>

                        @endauth
                    </div>
                @endif


                @auth
                    <div class="mt-5">
                        <h1 class="text-sm font-bold tracking-wider text-gray-400">Minha conta</h1>

                        <div class="">
                            <ul class="mt-5 space-y-2 text-gray-600" aria-label="submenu">

                                <li class="flex">
                                    <a class="inline-flex items-center w-full py-1 text-sm font-semibold transition-colors"
                                        href="{{ route('ecommerce.conta.cadastro') }}">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                                            </path>
                                        </svg>
                                        <span>Meus Dados</span>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a class="inline-flex items-center w-full py-1 text-sm font-semibold transition-colors"
                                        href="{{ route('ecommerce.conta.pedidos') }}">
                                        <svg class="w-6 h-6"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <path
                                                d="M9 6H15C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6ZM7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6H20C20.5523 6 21 6.44772 21 7V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V7C3 6.44772 3.44772 6 4 6H7ZM5 8V20H19V8H5ZM9 10C9 11.6569 10.3431 13 12 13C13.6569 13 15 11.6569 15 10H17C17 12.7614 14.7614 15 12 15C9.23858 15 7 12.7614 7 10H9Z">
                                            </path>
                                        </svg>

                                        <span>Meus Pedidos</span>
                                    </a>
                                </li>

                                {{-- <li class="flex">
                                    <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-3">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                        </svg>

                                        <span>Sair da Conta</span>
                                    </a>
                                    <form id="logout-form"
                                        action="{{ route('logout', ['prefix' => \Request::route('prefix')]) }}"
                                        method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                @endauth

                <div class="mt-5 ">
                    <h1 class="text-sm font-bold tracking-wider text-gray-400">Navegação</h1>

                    <ul class="flex flex-col gap-4 mt-5 text-sm font-semibold text-gray-600">
                        <li>
                            <a href="{{ route('ecommerce.produtos') }}"
                                class="hover:text-gray-200 {{ request()->routeIs('ecommerce.produtos') ? '' : '' }}">Cardapio</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200">Promoções</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200">Combos</a>
                        </li>
                        <li>
                            <a href="#" class="hover:text-gray-200">Contato</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>



        <div class="px-4 space-y-4">



        </div>
    </div>

</div>
