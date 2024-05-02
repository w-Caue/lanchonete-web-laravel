<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div x-data="{ endereco: 'retirada' }" class="w-full md:w-2/3">
            <div class="flex justify-around pb-8 border-b">
                <button
                    class="flex justify-center py-3 px-4 text-md font-semibold text-center text-gray-400 uppercase border rounded border-gray-400 transition-all delay-100"
                    :class="{ 'active text-white bg-purple-700 border-none': endereco === 'retirada' }"
                    x-on:click="endereco = 'retirada'">
                    Retirada no Local
                </button>

                <button
                    class="flex justify-center py-3 px-5 text-md font-semibold text-center text-gray-400 uppercase border rounded border-gray-400 transition-all delay-100"
                    :class="{ 'active text-white bg-purple-700 border-none': endereco === 'entrega' }"
                    x-on:click="endereco = 'entrega'">
                    Entrega
                </button>
            </div>

            <div class="px-10 py-5 rounded-md shadow-md bg-white">
                <div x-show="endereco === 'entrega'" class="mt-2">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">
                        Local para entrega
                    </h1>

                    <div class="flex gap-1 sm:gap-2 flex-wrap">
                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Cep') }}
                            </p>

                            <div class="flex flex-row items-center gap-1 w-32">
                                <x-input-ecommerce wire:model.lazy="cep" type="text"></x-input-ecommerce>

                                <button wire:click="updatedCep()" type="button"
                                    class="rounded py-3 px-2 text-white bg-purple-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                    </svg>

                                </button>
                            </div>
                        </label>

                        <label class="w-86">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Endereço') }}
                            </p>

                            <x-input-ecommerce wire:model.defer="endereco" id="endereco"></x-input-ecommerce>

                        </label>

                        <label class="w-20">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Número') }}
                            </p>

                            <x-input-ecommerce wire:model="numero" type="number"></x-input-ecommerce>
                        </label>

                        <label class="w-44">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Complemento') }}
                            </p>

                            <x-input-ecommerce wire:model="complemento" type="text"></x-input-ecommerce>
                        </label>

                        <label class="w-56">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Ponto de Referencia') }}
                            </p>

                            <x-input-ecommerce wire:model="referencia" type="text"></x-input-ecommerce>
                        </label>

                        <label class="w-56">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Bairro') }}
                            </p>

                            <x-input-ecommerce wire:model="bairro" type="text"></x-input-ecommerce>
                        </label>

                        {{-- <label class="w-44">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Cidade') }}
                            </p>

                            <x-input-ecommerce wire:model="cidade" type="text"></x-input-ecommerce>
                        </label> --}}
                    </div>

                    <div class="w-full flex justify-around items-end ">
                        @if ($entrega)
                            <button wire:click="salvar()"
                                class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center tracking-widest text-white uppercase border rounded bg-purple-700 cursor-pointer">
                                Salvar
                            </button>
                        @endif

                        <button wire:click="enderecos" x-data x-on:click="$dispatch('open-modal')"
                            class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center tracking-widest text-purple-700 uppercase border rounded border-purple-700 hover:text-white hover:bg-purple-700 transition-all duration-150 cursor-pointer">
                            Meus Endereços
                        </button>
                    </div>
                </div>

                <div x-show="endereco === 'retirada'">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">
                        Local para retirada
                    </h1>

                    <div class="flex items-center gap-3">
                        <button>
                            <svg class="w-16 h-16 text-purple-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>


                        <div>
                            <h1 class="uppercase tracking-wide text-gray-600 text-md font-semibold">Endereço</h1>
                            <span class="uppercase tracking-wide text-gray-600 text-md font-semibold">
                                Bairro - Cidade / CEP
                            </span>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-1/3">
            <a href="{{ route('ecommerce.pagamento') }}"
                class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                Fechar Carrinho
            </a>
        </div>

    </div>

    <div class="flex justify-center">
        <div x-data="{ open: false }" x-show="open" x-cloak x-on:open-modal.window="open = true"
            x-on:close-modal.window="open = false" x-on:keydown.escape.window="open = false"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-30 sm:items-center sm:justify-center">
            <div x-on:click ="open = false" class="fixed">
            </div>
            <div
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl">
                <div class="flex justify-between items-center m-1 dark:text-white">
                    <h1 class="text-md tracking-widest uppercase text-gray-600 font-semibold">Seus Endereços</h1>
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" x-on:click="open = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div>
                    @if ($enderecosUsers)
                        @foreach ($enderecosUsers as $enderecos)
                            <div wire:key="{{ $enderecos->id }}" wire:click="enderecoSalvo({{ $enderecos->id }})"
                                class="w-full shadow-lg border rounded-md cursor-pointer hover:scale-95 transition-all duration-200">
                                <div class="font-semibold tracking-widest text-gray-600 m-2">
                                    <span>cep: {{ $enderecos->cep }}</span>
                                    <div class="flex gap-1">
                                        <h1>{{ $enderecos->endereco }}</h1> -
                                        <span>{{ $enderecos->bairro }}</span> -
                                        <span>N: {{ $enderecos->numero }}</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h1 class="text-center text-md tracking-widest uppercase text-gray-600 font-semibold my-5">
                            Nenhum endereço salvo!
                        </h1>
                    @endif

                </div>

            </div>
        </div>
    </div>

</div>
