<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div class="w-full md:w-2/3">

            <div class="rounded-md shadow-md bg-white px-10 py-5">
                <div class="mt-2 ">

                    <div class="flex flex-col gap-4">
                        <div class="flex gap-7 w-full">
                            <label class="w-96">
                                <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                    {{ __('Número do Cartão') }}
                                </p>

                                <x-input-ecommerce placeholder="Número do Cartão"></x-input-ecommerce>

                            </label>

                            <label class="w-96">
                                <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                    {{ __('Nome do Titular') }}
                                </p>

                                <x-input-ecommerce placeholder="Nome do Titular"></x-input-ecommerce>

                            </label>
                        </div>

                        <div class="flex gap-7">
                            <label class="w-32">
                                <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                    {{ __('validade') }}
                                </p>

                                <x-input-ecommerce placeholder="07/27"></x-input-ecommerce>

                            </label>

                            <label class="w-32">
                                <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                    {{ __('CVV') }}
                                </p>

                                <x-input-ecommerce placeholder="CVV"></x-input-ecommerce>

                            </label>
                        </div>
                    </div>

                    <div class="w-full flex justify-around items-end ">

                        <button wire:click="salvar()"
                            class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center tracking-widest text-white uppercase border rounded bg-purple-700 cursor-pointer">
                            Salvar
                        </button>
                    </div>
                </div>

            </div>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-1/3">
            <a href="{{ route('ecommerce.pedido') }}"
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
