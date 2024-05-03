<heade class="fixed top-0 w-full z-50">
    <nav class="navbar bg-gray-50 border-gray-200 p-1">
        <div class="flex items-center justify-around max-w-screen-xl px-4 py-1 mx-auto">
            <a href="\" class="flex items-center">
                {{-- <img src="./images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" /> --}}
                <span class="self-center text-xl font-semibold whitespace-nowrap">LancheCode</span>
            </a>

            @livewire('Ecommerce.Ecommerce.PesquisaProduto')

            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class="p-4 text-right ">
                        @auth
                            <button x-on:click="openUser = !openUser"
                                class="p-1 text-md text-gray-600 font-semibold tracking-widest transition duration-300 cursor-pointer">
                                Olá, <span class=" text-purple-700">{{ auth()->user()->name }}</span>
                            </button>
                            <div x-show="openUser" class="">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="openUser=false" @keydown.escape="openUser=false"
                                    class="absolute right-32 z-50 p-2 mt-4 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                                    aria-label="submenu">

                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                            href="{{ route('ecommerce.conta.cadastro') }}">
                                            <svg class="w-4 h-4 mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H18C18 18.6863 15.3137 16 12 16C8.68629 16 6 18.6863 6 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11Z">
                                                </path>
                                            </svg>
                                            <span>Meus Dados</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                            href="{{ route('ecommerce.conta.pedidos') }}">
                                            <svg class="w-4 h-4 mr-3"xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M9 6H15C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6ZM7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6H20C20.5523 6 21 6.44772 21 7V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V7C3 6.44772 3.44772 6 4 6H7ZM5 8V20H19V8H5ZM9 10C9 11.6569 10.3431 13 12 13C13.6569 13 15 11.6569 15 10H17C17 12.7614 14.7614 15 12 15C9.23858 15 7 12.7614 7 10H9Z">
                                                </path>
                                            </svg>

                                            <span>Meus Pedidos</span>
                                        </a>
                                    </li>

                                    <li class="flex">
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
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-700 hover:text-gray-900">
                                <span>Bem vindo : ) </span><br>
                                <p class="text-left text-purple-700">Entre <span class="text-gray-700">ou</span> cadastre-se
                                </p>

                            </a>
                        @endauth
                    </div>
                @endif

                @livewire('Ecommerce.Ecommerce.CarrinhoBotao')

            </div>
        </div>
    </nav>

    <article class="element-animation bg-purple-900 z-10">
        <nav class="flex justify-center items-center gap-7" id="mobile-menu-2">
            <ul
                class="flex flex-col p-3 mt-4 text-sm font-medium tracking-widest text-white uppercase lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('ecommerce.produtos') }}"
                        class="hover:text-gray-200 p-3 {{ request()->routeIs('ecommerce.produtos') ? 'text-white bg-gray-900 opacity-55' : 'text-white hover:bg-gray-900 hover:opacity-55' }}">Cardapio</a>
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
        </nav>

    </article>
</heade>
