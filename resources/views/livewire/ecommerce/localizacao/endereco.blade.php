<div>
    <div class="flex flex-col justify-center my-10 mx-7 md:flex-row">
        <div class="w-full px-10 py-10 rounded-lg shadow-lg bg-white md:w-2/3">
            <div class="flex justify-between pb-8 border-b">
                <h1 class="text-2xl font-semibold">Sua Localização</h1>
                <h2 class="text-2xl font-semibold">Endereço</h2>
            </div>

            <div class="">
                <div action="" class="mt-2">
                    <div class="flex gap-1 sm:gap-2 flex-wrap">
                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Cep') }}
                            </p>

                            <div class="flex flex-row items-center gap-1">
                                <input wire:model.lazy="cep" type="text"
                                    class="appearance-none block w-32 font-semibold text-gray-700 border-2 rounded py-3 px-4">
                                <button wire:click="" type="button"
                                    class="rounded py-3 px-2 text-white bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>

                                </button>
                            </div>
                        </label>

                        {{-- <h1>{{ $endereco }}</h1> --}}
                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Endereço') }}
                            </p>

                            <input wire:model.defer="endereco" 
                                class=" w-86 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Número') }}
                            </p>

                            <input wire:model="numero" type="number"
                                class="appearance-none block w-20 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Complemento') }}
                            </p>

                            <input wire:model="complemento" type="text"
                                class="appearance-none block w-44 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Ponto de Referencia') }}
                            </p>

                            <input wire:model="referencia" type="text"
                                class="appearance-none block w-44 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Bairro') }}
                            </p>

                            <input wire:model="bairro" type="text"
                                class="appearance-none block w-44 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Cidade') }}
                            </p>

                            <input wire:model="cidade" type="text"
                                class="appearance-none block w-44 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>
                    </div>

                </div>
            </div>
            <div class="w-full flex justify-center items-end ">
                @if ($localizacao == null)
                    <button wire:click="salvar()"
                        class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500 cursor-pointer">
                        Salvar
                    </button>
                @endif
            </div>
        </div>
        <div id="summary" class="w-full px-8 py-10 rounded-r bg-gray-100 dark:bg-gray-800 md:w-1/4">
            <div class="mt-8 border-t">

                @if ($localizacao != null)
                    <a href="{{ route('ecommerce.localizacao') }}"
                        class="flex justify-center w-full py-3 text-sm font-semibold text-center text-white uppercase hover:opacity-75">
                        Concluir Pedido
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endif

                <a
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500">
                    Voltar à loja
                </a>
            </div>
        </div>
    </div>
</div>
