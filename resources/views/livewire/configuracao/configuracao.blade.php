<div>
    <div class="flex justify-center flex-wrap">
        <a wire:click.prevent="mostrarUsuarios()"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 cursor-pointer">
            <div class="flex justify-center text-gray-600 bg-gray-200 p-4 rounded-full m-2">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-11 h-11">
                    <path fill-rule="evenodd"
                        d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                        clip-rule="evenodd" />
                    <path
                        d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                </svg>

            </div>
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-600 ">Usuários</h5>
            </div>
        </a>
    </div>

    @if ($showTelaUsuarios)
        <div class="flex justify-center">
            <div class="fixed top-1 sm:top-20  bg-gray-50 w-80 sm:w-2/5  shadow-2xl border rounded">

                <div class="flex justify-between m-1">
                    <h1 class="text-center font-bold text-gray-700 text-2xl tracking-widest mb-2">Usuários</h1>

                    <button wire:click.prevent='fecharTela()'
                        class="border rounded m-2 hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="m-3">
                    <div>
                        <button wire:click.prevent="novoUser()"
                            class="font-semibold text-gray-700 border shadow-lg rounded-lg p-2 hover:text-white hover:bg-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-10 h-10">
                                <path
                                    d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                            </svg>

                            Novo
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 m-3 mt-8">
                    <div>
                        @foreach ($users as $user)
                            <h1 class="font-semibold border p-2 rounded-xl w-52 hover:bg-gray-100 cursor-pointer">
                                {{ $user->name }}</h1>
                        @endforeach
                    </div>
                    <div>
                        
                    </div>
                </div>

            </div>
        </div>
    @endif

    @if ($newUser)
        <div class="flex justify-center">
            <div class="fixed top-20 sm:top-44 bg-gray-50 w-72 shadow-2xl border rounded">
                <div class="flex justify-between items-center m-1">
                    <h1 class="text-center font-bold text-gray-700 text-xl tracking-widest mb-2">Novo</h1>

                    <button wire:click.prevent='fecharUser()'
                        class="border rounded m-2 hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
