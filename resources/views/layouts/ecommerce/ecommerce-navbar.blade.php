<heade class="fixed top-0 z-50 w-full bg-gray-50">
    <nav class="border-gray-200 py-2">
        <div class="flex items-center justify-around max-w-screen-xl px-4 py-2 mx-auto">
            <a href="#" class="flex items-center">
                {{-- <img src="./images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Landwind Logo" /> --}}
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">LancheCode</span>
            </a>

            @livewire('Ecommerce.Ecommerce.PesquisaProduto')

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

                @livewire('Ecommerce.Ecommerce.CarrinhoBotao')

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
