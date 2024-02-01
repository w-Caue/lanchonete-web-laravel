<div>
    <div class="flex justify-center mt-2">
        <div class="w-full px-10 py-10 rounded-lg shadow-lg bg-white md:w-1/2">
            <div class="flex justify-between pb-8 border-b">
                <h1 class="text-2xl font-semibold">Sua Localização</h1>
                <h2 class="text-2xl font-semibold">Endereço</h2>
            </div>

            <div class="">
                <form action="" class="mt-2">
                    <div class="flex gap-2 flex-wrap">
                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Cep') }}
                            </p>

                            <input wire:model="cep" type="text"
                                class="appearance-none block w-32 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Endereço') }}
                            </p>

                            <input wire:model="endereco" type="text"
                                class="appearance-none block w-86 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
                        </label>

                        <label class="">
                            <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">
                                {{ __('Número') }}
                            </p>

                            <input wire:model="bairro" type="number"
                                class="appearance-none block w-20 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3">
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


                    {{-- <label class="w-full" for="">
                    <p class="uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">{{ __('E-mail') }}</p>

                    <input id="email" type="text"
                        class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   </label> --}}


                </form>
            </div>
            <div class="w-full flex justify-center items-end ">
                {{-- @if ($nome == null) --}}
                <button wire:click="salvar()"
                    class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500 cursor-pointer">
                    Salvar
                </button>
                {{-- @endif --}}
            </div>
        </div>
        <div id="summary" class="w-full px-8 py-10 rounded-r bg-gray-100 dark:bg-gray-800 md:w-1/4">
            <div class="mt-8 border-t">

                <a href="{{ route('ecommerce.localizacao') }}"
                    class="flex justify-center w-full py-3 text-sm font-semibold text-center text-white uppercase hover:opacity-75">
                    Concluir Pedido
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>

                <a
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500">
                    Voltar à loja
                </a>
            </div>
        </div>
    </div>
</div>
