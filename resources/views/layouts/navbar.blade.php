<nav class="w-full bg-white dark:bg-gray-800">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start mx-5 text-white">
                <button x-on:click="sidebar.full = !sidebar.full" class=" focus:outline-none">
                    {{-- Menu Icon --}}
                    <svg class="w-6 h-6" x-bind:class="sidebar.full ? 'hidden' : ''" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path>
                    </svg>

                    {{-- Close Icon --}}
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6" x-bind:class="sidebar.full ? '' : 'hidden'">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>

                <a href="" class="flex ml-2 md:mr-24">
                    {{-- <img src="/images/logo.svg" class="h-8 mr-3" alt="FlowBite Logo" /> --}}
                    <span
                        class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">LancheAdmin</span>
                </a>

            </div>
            <div class="flex items-center">

                <!-- Profile -->
                <div x-data="{ isOpen: false }" class="flex items-center ml-3">
                    <div class="text-gray-400">
                        <button x-on:click="isOpen = !isOpen" @click.outside="isOpen = false" type="button"
                            class="flex items-center gap-2 text-sm rounded-full border-2 py-1 px-2 dark:border-gray-600"
                            id="user-menu-button-2" aria-expanded="false" data-dropdown-toggle="dropdown-2">
                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor" class="size-6">
                                <path fill-rule="evenodd"
                                    d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z"
                                    clip-rule="evenodd" />
                            </svg>

                            <span class="text-xs font-semibold uppercase">{{ auth()->user()->name }}</span>

                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                                </path>
                            </svg>

                        </button>
                    </div>
                    <!-- Dropdown menu -->
                    <div x-show="isOpen">
                        <div class="z-50 fixed right-7 top-14 my-4 text-gray-400 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-800 dark:divide-gray-600"
                            id="dropdown-2">

                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{ auth()->user()->name }}
                                </p>
                                {{-- <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{ auth()->user()->email }}
                                </p> --}}
                            </div>

                            <ul class="py-1" role="none">
                                <li class="flex">
                                    <a class="inline-flex items-center gap-1 w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md"
                                        href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                                        </svg>

                                        <span class="text-xs uppercase">Sair</span>
                                    </a>
                                    <form id="logout-form"
                                        action="{{ route('logout', ['prefix' => \Request::route('prefix')]) }}"
                                        method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>
