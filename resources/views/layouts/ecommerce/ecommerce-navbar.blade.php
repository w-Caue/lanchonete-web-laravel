<heade class="fixed top-0 z-50 w-full bg-gray-50">
    <nav class="border-gray-200 py-2">
        <div class="flex items-center justify-around max-w-screen-xl px-4 py-2 mx-auto">
            <a href="#" class="flex items-center">
                {{-- <img src="./images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" /> --}}
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">LancheCode</span>
            </a>



            <div class="relative w-2/4 hidden sm:block">
                <input
                    class="block p-3 w-full shadow-md font-semibold rounded-full z-20 text-sm tracking-widest focus:outline-none focus:ring-2 active:ring-purple-500"
                    placeholder="O que você procura?">

                <button type="submit"
                    class="absolute top-0 right-0 p-3 text-sm text-purple-700 font-medium rounded transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>

            <div class="flex items-center">
                @if (Route::has('login'))
                    <div class=" p-4 text-right ">
                        @auth
                            <a href="{{ route('site.pedido.index') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm ">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-700 hover:text-gray-900">
                                <span>Bem vindo : ) </span><br>
                                <p class="text-left text-purple-700">Entre <span class="text-gray-700">ou</span> cadastre-se
                                </p>

                            </a>
                        @endauth
                    </div>
                @endif

                <a href="{{ route('ecommerce.pedido') }}"
                    class="flex gap-1 text-white bg-blue-500 font-semibold rounded-full text-md p-3 text-center transition-all hover:scale-95">
                    <svg class="w-7 h-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M4 4c0-.6.4-1 1-1h1.5c.5 0 .9.3 1 .8L7.9 6H19a1 1 0 0 1 1 1.2l-1.3 6a1 1 0 0 1-1 .8h-8l.2 1H17a3 3 0 1 1-2.8 2h-2.4a3 3 0 1 1-4-1.8L5.7 5H5a1 1 0 0 1-1-1Z"
                            clip-rule="evenodd" />
                    </svg>
                </a>

            </div>
        </div>
    </nav>

    <article class="element-animation bg-purple-900">
        <nav class="flex justify-center items-center gap-7 p-3" id="mobile-menu-2">
            <ul
                class="flex flex-col mt-4 text-sm font-medium tracking-widest text-white uppercase lg:flex-row lg:space-x-8 lg:mt-0">
                <li>
                    <a href="#" class="hover:text-gray-200">Produtos</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-200">Promoções</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-200">Combos</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-200">Features</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-200">Team</a>
                </li>
                <li>
                    <a href="#" class="hover:text-gray-200">Contato</a>
                </li>
            </ul>
        </nav>

    </article>
</heade>
