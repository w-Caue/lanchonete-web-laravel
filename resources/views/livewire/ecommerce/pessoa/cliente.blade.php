<div>
    <div class="flex flex-col justify-center my-10 mx-7 md:flex-row">
        <div class="w-full px-10 py-10 rounded-lg shadow-lg bg-white md:w-1/2">
            <div class="flex justify-between pb-8 border-b">
                <h1 class="text-2xl font-semibold">Suas Informações</h1>
                <h2 class="text-2xl font-semibold">Cliente</h2>
            </div>

            <div class="flex justify-center">
                <form action="" class="flex flex-col items-center justify-center mt-2">
                    <label class="w-full" for="">
                        <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">{{ __('Nome') }}
                        </p>

                        <input wire:model="nome" type="text"
                            class="appearance-none block w-full md:w-96 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('name') is-invalid @enderror"
                            name="name" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">{{ __('Whatsapp') }}
                        </p>

                        <input wire:model="whatsapp"
                            x-mask:dynamic=" $input.startsWith('34') || $input.startsWith('37') ? '(99) 99999-9999' : '(99) 9999-9999'"
                            class="appearance-none block w-full md:w-96 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('whatsapp') is-invalid @enderror"
                            name="whatsapp" value="{{ old('whatsapp') }}" required autocomplete="whatsapp"
                            placeholder="(00) 1 2345-6789">

                        @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <p class="uppercase tracking-wide text-gray-600 text-md font-semibold mb-2">{{ __('Email') }}
                        </p>

                        <input wire:model="email" type="email"
                            class="appearance-none block w-full md:w-96 font-semibold text-gray-700 border-2 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white @error('email') is-invalid @enderror"
                            name="name" required autocomplete="name" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>


                </form>
            </div>
            <div class="w-full flex justify-center items-end ">
                @if ($nome == null)
                    <button wire:click="salvar()"
                        class="flex justify-center w-44 py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500 cursor-pointer">
                        Salvar
                    </button>
                @endif
            </div>
        </div>
        <div id="summary" class="w-full px-8 py-10 rounded-r bg-gray-800 md:w-1/4">
            <div class="mt-8 border-t">

                @if ($cliente != null)
                    <a href="{{ route('ecommerce.localizacao') }}"
                        class="flex justify-center w-full py-3 text-sm font-semibold text-center text-white uppercase hover:opacity-75">
                        Preencher Localização
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endif

                <a href="{{ route('ecommerce.produtos') }}"
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500">
                    Voltar à loja
                </a>
            </div>
        </div>
    </div>
</div>
