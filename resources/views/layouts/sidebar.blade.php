
<div class="flex justify-between">

    {{-- Mobile menu Toggle --}}
    <div class="h-full flex-shrink-0 bg-white transition-all duration-300 hidden sm:block dark:bg-gray-800"
        x-bind:class="{
            'w-64': sidebar.full,
            'w-64 sm:w-20': !sidebar.full,
            'left-0': sidebar
                .navOpen,
            '-left-64 sm:left-0': !sidebar.navOpen
        }">
        {{-- <h1 class=" py-4  font-extrabold text-transparent text-gradient-to-r from-purple-700 to-blue-600 bg-clip-text bg-gradient-to-br"
                x-bind:class="sidebar.full ? 'text-3xl px-4' : 'hidden'">
                Rica Admin
            </h1>

            <h1 class="text-white font-black py-4" x-bind:class="sidebar.full ? 'hidden' : 'text-xl px-4 xm:px-2'">
                LOGO
            </h1> 

            <h1 class="text-white font-black py-4 bg-gray-100 dark:bg-gray-700"
                x-bind:class="sidebar.full ? 'text-lg  px-4' : 'hidden'">
                Usuario
            </h1> --}}

        <div class="mt-7 px-4 space-y-4">


            {{-- HOME --}}
            <a href="{{ route('admin.dashboard') }}"
                class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.dashboard') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                            d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z"
                            clip-rule="evenodd" />
                    </svg>


                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Dashboard
                    </h1>
                </div>
            </a>

            {{-- Clientes --}}
            <a href="{{ route('admin.pessoal.index') }}"
                class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.pessoal.*') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar.full,
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z"
                            clip-rule="evenodd" />
                        <path
                            d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                    </svg>


                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Clientes</h1>
                </div>

            </a>

            {{-- Reserva --}}
            {{-- <div x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
                x-on:click="$store.sidebar.active = 'reserva' "
                class="relative flex justify-between items-center font-semibold text-gray-400 hover:text-gray-200 hover:bg-gray-700 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'reserva',
                    'text-gray-400': $store
                        .sidebar.active≠ 'reserva'
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-calendar-minus" viewBox="0 0 16 16">
                        <path d="M5.5 9.5A.5.5 0 0 1 6 9h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    </svg>
                    <h1 x-clock
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Reserva</h1>
                </div>
                <div x-clock x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'" class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h1 class="w-5 h-5 p-1 bg-pink-400 rounded-sm text-sm leading-3 text-center text-gray-900">3
                    </h1>
                </div>
            </div> --}}

            {{-- Produtos --}}
            <div x-data="dropdown" class="relative">
                {{-- Dropdown Head --}}
                <div x-on:click="toggle('tickets')"
                    class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.produto.*') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                    x-bind:class="{
                        'justify-start': sidebar.full,
                        'sm:justify-center': !sidebar.full,
                    }">
                    <div class="flex items-center ">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M4 3a2 2 0 100 4h12a2 2 0 100-4H4z" />
                            <path fill-rule="evenodd"
                                d="M3 8h14v7a2 2 0 01-2 2H5a2 2 0 01-2-2V8zm5 3a1 1 0 011-1h2a1 1 0 110 2H9a1 1 0 01-1-1z"
                                clip-rule="evenodd" />
                        </svg>

                        <a href="">
                            <h1 x-clock class="ml-2"
                                x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                                    'sm:hidden' : ''">
                                Produtos
                            </h1>
                        </a>
                    </div>

                    <svg x-clock x-bind:class="sidebar.full ? '' : 'sm:hidden'" class="w-6 h-6 " aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m8 10 4 4 4-4" />
                    </svg>
                </div>
                {{-- Dropdown --}}
                <div x-clock x-show="open" @click.outside="open =false"
                    x-bind:class="sidebar.full ? dropdown.expandedClass : dropdown.shrinkedClass"
                    class="text-gray-400 space-y-3 bg-gray-700 rounded p-1 m-1">

                    <a href="{{ route('admin.produto.index') }}"
                        class="flex gap-1 items-center text-sm font-semibold rounded-lg group transition duration-75">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4.243a1 1 0 1 0-2 0V11H7.757a1 1 0 1 0 0 2H11v3.243a1 1 0 1 0 2 0V13h3.243a1 1 0 1 0 0-2H13V7.757Z"
                                clip-rule="evenodd" />
                        </svg>

                        Cadastro
                    </a>

                    <a href="{{ route('admin.produto.encarte.index') }}"
                        class="flex gap-1 items-center text-sm font-semibold rounded-lg group transition duration-75">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M18.045 3.007 12.31 3a1.965 1.965 0 0 0-1.4.585l-7.33 7.394a2 2 0 0 0 0 2.805l6.573 6.631a1.957 1.957 0 0 0 1.4.585 1.965 1.965 0 0 0 1.4-.585l7.409-7.477A2 2 0 0 0 21 11.479v-5.5a2.972 2.972 0 0 0-2.955-2.972Zm-2.452 6.438a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                        </svg>

                        Encarte
                    </a>

                    <a href="{{ route('admin.produto.combos.index') }}"
                        class="flex gap-1 items-center text-sm font-semibold rounded-lg group transition duration-75">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5.617 2.076a1 1 0 0 1 1.09.217L8 3.586l1.293-1.293a1 1 0 0 1 1.414 0L12 3.586l1.293-1.293a1 1 0 0 1 1.414 0L16 3.586l1.293-1.293A1 1 0 0 1 19 3v18a1 1 0 0 1-1.707.707L16 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L12 20.414l-1.293 1.293a1 1 0 0 1-1.414 0L8 20.414l-1.293 1.293A1 1 0 0 1 5 21V3a1 1 0 0 1 .617-.924ZM9 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Zm0 4a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z"
                                clip-rule="evenodd" />
                        </svg>

                        Combos
                    </a>
                </div>
            </div>

            {{-- Pedido --}}
            <a href="{{ route('admin.pedido.index') }}"
            class="relative flex justify-between items-center font-semibold space-x-2 rounded-md p-2 cursor-pointer {{ request()->routeIs('admin.pedido.*') ? 'text-purple-500 border-2 border-purple-500' : 'text-gray-500 dark:text-gray-400' }}"
                x-bind:class="{
                    'justify-start': sidebar.full,
                    'sm:justify-center': !sidebar
                        .full,
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                    </svg>

                    <h1 x-clock
                        x-bind:class="!sidebar.full && tooltip.show ? visibleClass : '' || !sidebar.full && !tooltip.show ?
                            'sm:hidden' : ''">
                        Pedidos
                    </h1>
                </div>
            </a>

        </div>
    </div>
</div>
