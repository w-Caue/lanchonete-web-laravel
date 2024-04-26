<heade class="fixed top-0 w-full z-50">
    <nav class="navbar bg-gray-50 border-gray-200 p-2">
        <div class="flex items-center justify-around max-w-screen-xl px-4 py-1 mx-auto">
            <a href="\" class="flex items-center">
                {{-- <img src="./images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" /> --}}
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">LancheCode</span>
            </a>

            @livewire('Ecommerce.Ecommerce.PesquisaProduto')

            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class=" p-4 text-right ">
                        @auth
                            <button x-on:click="openUser = !openUser"
                                class="p-1 text-md text-gray-600 font-semibold tracking-widest transition duration-300 cursor-pointer">
                                Olá, <span class=" text-purple-700">{{ auth()->user()->name }}</span>
                            </button>
                            <div x-show="openUser" class="">
                                <ul x-transition:leave="transition ease-in duration-150"
                                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                    @click.away="openUser=false" @keydown.escape="openUser=false"
                                    class="absolute right-28 z-50 p-2 mt-4 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                                    aria-label="submenu">
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                            href="">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            <span>Meus Dados</span>
                                        </a>
                                    </li>
                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                            href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-3" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                            <span>Meus Pedidos</span>
                                        </a>
                                    </li>

                                    <li class="flex">
                                        <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800"
                                            href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path
                                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <span>Sair</span>
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
        <nav class="flex justify-center items-center gap-7 p-3" id="mobile-menu-2">
            <ul
                class="flex flex-col mt-4 text-sm font-medium tracking-widest text-white uppercase lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="{{ route('ecommerce.produtos') }}" class="hover:text-gray-200">Cardapio</a>
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
