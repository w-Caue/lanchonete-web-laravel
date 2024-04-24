<div>
    {{-- <div class="flex flex-col justify-center my-10 mx-7 md:flex-row">
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
    </div> --}}
    <div class="flex flex-col items-start gap-5 mx-8 md:flex-row body-font">

        <div class="flex-1 p-8 rounded-md">
            <h4 class="mb-4 text-lg font-semibold text-center tracking-widest">
                FAZER LOGIN
            </h4>
            <div class="flex flex-col w-full gap-4 bg-white rounded-md">
                <form method="POST" action="{{ route('login') }}" class="rounded px-8 pt-6 pb-8">
                    @csrf
                    <div class="mb-4">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            Email
                        </label>

                        <x-input-ecommerce class="'email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" id="username" type="email"></x-input-ecommerce>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest" for="password">
                            Senha
                        </label>

                        <x-input-ecommerce class="@error('password') is-invalid @enderror" name="password"
                            id="password" type="password" value="{{ old('password') }}"></x-input-ecommerce>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="flex justify-center gap-2">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Entrar
                        </button>

                    </div>
                </form>

                <button
                    class="mb-1 text-base font-normal text-gray-600 tracking-widest text-center hover:text-blue-500 hover:underline">
                    Esqueci minha senha
                </button>
            </div>

        </div>

        <div class="flex-1 p-8 border-t-2 md:border-l-2 md:border-t-0">
            <h4 class="mb-4 text-lg font-semibold text-center">
                CRIAR MINHA CONTA
            </h4>
            <div class="flex flex-col w-full gap-4 bg-white rounded-md">
                <form method="POST" action="{{ route('register') }}" class="rounded px-8 pt-6 pb-8 mb-4">
                    @csrf

                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            Nome
                        </label>

                        <x-input-ecommerce id="name" type="text" class="@error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name"></x-input-ecommerce>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            Email
                        </label>

                        <x-input-ecommerce id="email" type="text" class="@error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required
                            autocomplete="email"></x-input-ecommerce>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            whatsapp
                        </label>

                        <x-input-ecommerce id="whatsapp" type="tel" class="@error('whatsapp') is-invalid @enderror"
                            name="whatsapp" value="{{ old('whatsapp') }}" required
                            autocomplete="whatsapp"></x-input-ecommerce>

                        @error('whatsapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <div class="flex gap-2">
                        <label class="w-full" for="">
                            <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                                senha
                            </label>

                            <x-input-ecommerce id="password" type="password"
                                class="@error('password') is-invalid @enderror" name="password"
                                value="{{ old('password') }}" required autocomplete="new-password"></x-input-ecommerce>

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>

                        <label class="w-full" for="">
                            <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                                confirmar senha
                            </label>

                            <x-input-ecommerce id="password_confirmation" type="password" name="password_confirmation"
                                value="{{ old('password') }}" required autocomplete="new-password"></x-input-ecommerce>
                        </label>
                    </div>

                    <div class="flex justify-center my-3">
                        <button type="submit" class="p-2 border rounded bg-blue-500 text-white font-semibold">
                            {{ __('Cadastrar') }}
                        </button>
                    </div>

                </form>
            </div>


        </div>

    </div>
</div>
