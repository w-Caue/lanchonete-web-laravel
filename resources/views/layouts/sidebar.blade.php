<div x-data class="mx-auto antialiased flex justify-between">

    {{-- Mobile menu Toggle --}}
    <button x-on:click="$store.sidebar.navOpen = !$store.sidebar.navOpen"
        class="sm:hidden absolute top-5 right-5 focus:outline-none">
        {{-- Menu Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6" x-bind:class="$store.sidebar.navOpen ? 'hidden' : ''">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
        </svg>

        {{-- Close Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="w-6 h-6" x-bind:class="$store.sidebar.navOpen ? '' : 'hidden'">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>

    </button>

    <div class="h-screen bg-gray-900 transition-all duration-300 space-y-2 fixed "
        x-bind:class="{
            'w-64': $store.sidebar.full,
            'w-64 sm:w-20': !$store.sidebar.full,
            'top-0 left-0': $store.sidebar
                .navOpen,
            'top-0 -left-64 sm:left-0': !$store.sidebar.navOpen
        }">
        <h1 class="text-white font-black py-4"
            x-bind:class="$store.sidebar.full ? 'text-2xl px-4' : 'text-xl px-4 xm:px-2'">
            LOGO
        </h1>
        <div class="px-4 space-y-2">
            {{-- Sidebar Toggle --}}
            <button x-on:click="$store.sidebar.full = !$store.sidebar.full"
                class="hidden sm:block focus:outline-none absolute p-1 text-white -right-3 top-10 bg-gray-900 rounded-full shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    x-bind:class="$store.sidebar.full ? 'rotate-90' : '-rotate-90'" stroke="currentColor"
                    class="w-4 h-4 transition-all duration-300 transform text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                </svg>
            </button>

            {{-- HOME --}}
            <a href="{{ route('painel.dashboard') }}" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false" x-on:click="$store.sidebar.active = 'home' "
                class="relatice flex items-center font-semibold  hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'home',
                    'text-gray-400': $store.sidebar
                    .active = 'home'
                }">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
                <h1 x-clock
                    x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ? 'sm:hidden' : ''">
                    Dashboard</h1>
            </a>

            {{-- Client --}}
            <a href="{{ route('painel.clientes') }}" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false" x-on:click="$store.sidebar.active = 'cliente' "
                class="relatice flex justify-between items-center font-semibold text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'cliente',
                    'text-gray-400': $store.sidebar
                        .active≠ 'cliente'
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>

                    <h1 x-clock
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Clientes</h1>
                </div>

            </a>

            {{-- Item --}}
            <a href="{{ route('painel.itens') }}" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false" x-on:click="$store.sidebar.active = 'item' "
                class="relatice flex justify-between items-center font-semibold text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'item',
                    'text-gray-400': $store.sidebar
                        .active≠ 'item'
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>

                    <h1 x-clock
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Itens</h1>
                </div>

            </a>

            {{-- Pedidos --}}
            <a href="{{ route('painel.pedidos') }}" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false" x-on:click="$store.sidebar.active = 'pedido' "
                class="relatice flex justify-between items-center font-semibold text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'pedido',
                    'text-gray-400': $store.sidebar
                        .active≠ 'pedido'
                }">
                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>

                    <h1 x-clock
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Pedidos</h1>
                </div>
                <h1 x-clock x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                    class="w-5 h-5 p-1 bg-green-400 rounded-sm text-sm leading-3 text-center text-gray-900">8</h1>
            </a>

            {{-- SCHEDULES --}}
            <div x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
                x-on:click="$store.sidebar.active = 'schedules' "
                class="relatice flex justify-between items-center font-semibold text-gray-400 hover:text-gray-200 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'schedules',
                    'text-gray-400': $store
                        .sidebar.active≠ 'schedules'
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
                        Schedules</h1>
                </div>
                <div x-clock x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                    class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h1 class="w-5 h-5 p-1 bg-pink-400 rounded-sm text-sm leading-3 text-center text-gray-900">3</h1>
                </div>
            </div>

            {{-- Parametros --}}
            <div x-data="dropdown" class="relative">
                {{-- Dropdown Head --}}
                <div x-on:click="toggle('parametros')" x-data="tooltip" x-on:mouseover="show = true"
                    x-on:mouseleave="show = false"
                    class="flex justify-between text-gray-400 font-semibold hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar
                            .full,
                        'text-gray-400 bg-gray-800': $store.sidebar.active = 'parametros',
                        'text-gray-400': $store
                            .sidebar.active≠ 'parametros'
                    }">
                    <div class="relative flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                        </svg>

                        <h1 x-clock
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">
                            Parametros</h1>
                    </div>
                    <svg x-clock x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                    </svg>
                </div>
                {{-- Dropdown Content --}}
                <div x-clock x-show="open" @click.outside="open =false"
                    x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                    class="text-gray-400 space-y-3">
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                </div>
            </div>

            {{-- INCOME --}}
            <div x-data="dropdown" class="relative">
                {{-- Dropdown Head --}}
                <div x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
                    x-on:click="toggle('income')"
                    class="flex justify-between text-gray-400 font-semibold hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar
                            .full,
                        'text-gray-400 bg-gray-800': $store.sidebar.active = 'income',
                        'text-gray-400': $store
                            .sidebar.active≠ 'income'
                    }">
                    <div x-clock class="relative flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>
                        <h1 x-clock
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">
                            Income</h1>
                    </div>
                    <svg x-clock x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                    </svg>
                </div>
                {{-- Dropdown Content --}}
                <div x-clock x-show="open" @click.outside="open = false"
                    x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                    class="text-gray-400 space-y-3">
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                    {{-- Sub Dropdown --}}
                    <div x-clock x-data="sub_dropdown" class="relative w-full">
                        <div x-on:click="sub_toggle()" class="flex items-center justify-between cursor-pointer">
                            <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                            </svg>
                        </div>
                        <div x-clock x-show="sub_open" @click.outside="sub_open = false"
                            x-bind:class="$store.sidebar.full ? sub_expandedClass : sub_shrinkedClass">
                            <h1 class="hover:text-gray-200 cursor-pointer">Sub Item 1</h1>
                            <h1 class="hover:text-gray-200 cursor-pointer">Sub Item 2</h1>
                            <h1 class="hover:text-gray-200 cursor-pointer">Sub Item 3</h1>
                        </div>
                    </div>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                </div>
            </div>

            {{-- PROMOTE --}}
            <div x-data="dropdown" class="relative">
                {{-- Dropdown Head --}}
                <div x-data="tooltip" x-on:mouseover="show = true" x-on:mouseleave="show = false"
                    x-on:click="toggle('promote')"
                    class="flex justify-between text-gray-400 font-semibold hover:text-gray-200 hover:bg-gray-800 items-center space-x-2 rounded-md p-2 cursor-pointer"
                    x-bind:class="{
                        'justify-start': $store.sidebar.full,
                        'sm:justify-center': !$store.sidebar
                            .full,
                        'text-gray-400 bg-gray-800': $store.sidebar.active = 'promote',
                        'text-gray-400': $store
                            .sidebar.active≠ 'promote'
                    }">
                    <div x-clock class="relative flex space-x-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                        </svg>
                        <h1 x-clock
                            x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                                'sm:hidden' : ''">
                            Promote</h1>
                    </div>
                    <svg x-clock x-bind:class="$store.sidebar.full ? '' : 'sm:hidden'"
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z" />
                    </svg>
                </div>
                {{-- Dropdown Content --}}
                <div x-clock x-show="open" @click.outside="open =false"
                    x-bind:class="$store.sidebar.full ? expandedClass : shrinkedClass"
                    class="text-gray-400 space-y-3">
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 1</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 2</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 3</h1>
                    <h1 class="hover:text-gray-200 cursor-pointer">Item 4</h1>
                </div>
            </div>

            {{-- Logout --}}
            <a href="{{ route('logout') }}" x-data="tooltip" x-on:mouseover="show = true"
                x-on:mouseleave="show = false" x-on:click="$store.sidebar.active = 'item' "
                class="relatice flex justify-between items-center font-semibold text-blue-100 hover:text-red-400 hover:bg-gray-800 space-x-2 rounded-md p-2 cursor-pointer"
                x-bind:class="{
                    'justify-start': $store.sidebar.full,
                    'sm:justify-center': !$store.sidebar
                        .full,
                    'text-gray-400 bg-gray-800': $store.sidebar.active = 'sair',
                    'text-gray-400': $store.sidebar
                        .active≠ 'sair'
                }"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">

                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>

                    <h1 x-clock
                        x-bind:class="!$store.sidebar.full && show ? visibleClass : '' || !$store.sidebar.full && !show ?
                            'sm:hidden' : ''">
                        Sair</h1>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('sidebar', {
                full: false,
                active: 'home',
                navOpen: false
            });

            Alpine.data('dropdown', () => ({
                open: false,
                toggle(tap) {
                    this.open = !this.open;
                    Alpine.store('sidebar').active = tab;
                },
                activeClass: 'bg-gray-800 text-gray-200',
                expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                shrinkedClass: 'sm:absolute top-0 left-20 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));

            //Dropdown
            Alpine.data('sub_dropdown', () => ({
                sub_open: false,
                sub_toggle() {
                    this.sub_open = !this.sub_open;
                },
                sub_expandedClass: 'border-l border-gray-400 ml-4 pl-4',
                sub_shrinkedClass: 'sm:absolute top-0 left-28 sm:shadow-md sm:z-10 sm:bg-gray-900 sm:rounded-md sm:p-4 border-l sm:border-none border-gray-400 ml-4 pl-4 sm:ml-0 w-28'
            }));

            Alpine.data('tooltip', () => ({
                show: false,
                visibleClass: 'block sm:absolute -top-7 sm:border border-gray-800 left-5 sm:text-sm sm:bg-gray-900 sm:px-2 sm:py-1 sm:rounded'
            }));
        })
    </script>
</div>
