<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div class="w-full md:w-2/3">
            <div class="flex justify-around pb-8 border-b">
                <button
                    class="flex justify-center py-3 px-5 text-md font-semibold text-center text-white uppercase rounded bg-purple-700">
                    Retirada no local
                </button>

                <button
                    class="flex justify-center py-3 px-5 text-md font-semibold text-center text-gray-300 uppercase border rounded border-gray-300 bg-white hover:text-white transition-all delay-100 hover:bg-blue-500 hover:border-blue-500">
                    Retirada
                </button>
            </div>

            <div class="px-10 py-5 rounded-md shadow-md bg-white">
                <div action="" class="mt-2">
                    <div class="flex gap-1 sm:gap-2 flex-wrap">
                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Cep') }}
                            </p>

                            <div class="flex flex-row items-center gap-1">
                                <input wire:model.lazy="cep" type="text"
                                    class="appearance-none block w-32 font-semibold text-gray-700 border-2 rounded py-3 px-4">
                                <button wire:click="updatedCep()" type="button"
                                    class="rounded py-3 px-2 text-white bg-blue-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>

                                </button>
                            </div>
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Endereço') }}
                            </p>

                            <input wire:model.defer="endereco"
                                class=" w-86 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3"
                                id="endereco">

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
                                class="appearance-none block w-56 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
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

                <div class="w-full flex justify-center items-end ">
                    @if ($localizacao == null)
                        <button wire:click="salvar()"
                            class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500 cursor-pointer">
                            Salvar
                        </button>
                    @endif
                </div>
            </div>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-1/3">
            <a href="{{ route('ecommerce.cliente') }}"
                class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                Fechar Carrinho
            </a>

            <a href="{{ route('ecommerce.produtos') }}"
                class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-gray-300 uppercase border rounded border-gray-300 bg-white hover:text-white transition-all delay-100 hover:bg-blue-500 hover:border-blue-500">
                Voltar à loja
            </a>
        </div>

    </div>
</div>
