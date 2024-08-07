<div>
    <div class="flex flex-col mt-20 md:flex-row body-font">

        <div class="flex-1 p-8">
            <h4 class="mb-4 text-lg font-semibold text-center tracking-widest">
                FAZER LOGIN
            </h4>
            <div class="flex flex-col w-full gap-4">
                <form method="POST" wire:submit="login()" class="rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            Email
                        </label>

                        <x-input-ecommerce wire:model="email" class="'email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" id="username" type="email"
                            placeholder="insira seu email aqui"></x-input-ecommerce>

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

                        <x-input-ecommerce wire:model="password" class="@error('password') is-invalid @enderror"
                            name="password" id="password" type="password" value="{{ old('password') }}"
                            placeholder="insira sua senha aqui"></x-input-ecommerce>

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
                    class="mb-4 text-base font-normal text-gray-600 tracking-widest text-center hover:text-blue-500 hover:underline">
                    Esqueci minha senha
                </button>
            </div>
        </div>

        <div class="flex-1 p-8 border-t-2 md:border-l-2 md:border-t-0">
            <h4 class="mb-4 text-lg font-semibold text-center">
                CRIAR MINHA CONTA
            </h4>

            <form method="POST" wire:submit="register()" class="flex flex-col gap-4 rounded px-8 pt-6 pb-8 mb-4">
                @csrf

                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        Nome*
                    </label>

                    <x-input-ecommerce wire:model="nome" id="nome" type="text" required
                        placeholder="insira seu nome aqui"></x-input-ecommerce>

                    @error('nome')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        Email*
                    </label>

                    <x-input-ecommerce wire:model="email" id="email" type="email" required
                        placeholder="insira seu email aqui"></x-input-ecommerce>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        telefone
                    </label>

                    <x-input-ecommerce wire:model="phone" id="telefone" type="tel" required
                        placeholder="insira seu número aqui"></x-input-ecommerce>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <div class="flex gap-2">
                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            senha*
                        </label>

                        <x-input-ecommerce wire:model="password" id="password" type="password" name="password" required
                            placeholder="insira sua senha aqui"></x-input-ecommerce>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </label>

                    <label class="w-full" for="">
                        <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                            confirmar senha*
                        </label>

                        <x-input-ecommerce id="password_confirmation" type="password" name="password_confirmation"
                            autocomplete="new-password" placeholder="confirme sua senha aqui"></x-input-ecommerce>
                    </label>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="p-2 border rounded bg-blue-500 text-white font-semibold">
                        {{ __('Cadastrar') }}
                    </button>
                </div>

            </form>

        </div>

    </div>
</div>
