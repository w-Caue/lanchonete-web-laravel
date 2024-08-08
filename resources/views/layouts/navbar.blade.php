<header class="py-2 border-b mx-5 mt-7 border-white dark:border-gray-700">
    <div class="flex items-center justify-between">
        <div class="flex my-1">
            
        </div>

        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Theme toggler -->
            <li class="flex">
                <button class="rounded-md focus:outline-none focus:shadow-outline-purple" @click="isDarkMode = !isDarkMode"
                    aria-label="Toggle color mode">
                    <template x-if="isDarkMode">
                        <svg class="w-6 h-6 text-neutral-300" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                    </template>
                    <template x-if="!isDarkMode">
                        <svg class="w-6 h-6 text-yellow-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </button>
            </li>

            <!-- Profile menu -->
            <li x-title="NavBar:ProfileMenu" x-data="{ isProfileMenuOpen: false }" class="relative" wfd-id="105">
                <button
                    class="flex items-center gap-1 border-2 rounded-full p-2 dark:text-neutral-300 dark:border-gray-600"
                    x-on:click="isProfileMenuOpen = !isProfileMenuOpen;" @keydown.escape="isProfileMenuOpen = false"
                    @click.away="isProfileMenuOpen = false;" aria-label="Account" aria-haspopup="true" wfd-id="146">

                    <span class="text-xs font-semibold tracking-widest uppercase hidden sm:block">Olá,
                        {{ auth()->user()->name }}
                    </span>

                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                        </path>
                    </svg>
                </button>

                <template x-if="isProfileMenuOpen">
                    <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0" @keydown.escape="isProfileMenuOpen = false; "
                        class="absolute right-0 z-40 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-800"
                        aria-label="submenu">

                        <li class="flex">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="inline-flex items-center w-full px-2 py-1 text-xs font-semibold uppercase transition-colors duration-150 rounded-md hover:bg-red-100 hover:text-gray-800 dark:hover:bg-red-800 dark:hover:text-gray-200">
                                <svg class="w-5 h-5 mr-3" aria-hidden="true" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                    </path>
                                </svg>
                                <span>Sair</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </template>
            </li>
            <!-- Profile menu -->
        </ul>
    </div>
</header>
