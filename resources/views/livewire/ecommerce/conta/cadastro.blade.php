<div>
    <div class="flex-1 p-5 bg-white rounded-md">

        <div class="mb-4 text-gray-700 tracking-wider">
            <h4 class="text-2xl font-bold ">
                Meus Dados
            </h4>
            <span class="text-sm">Confira ou altere seus dados de cadastro.</span>
        </div>

        <div class="px-1 py-5">
            <div class="grid grid-cols-2 gap-4">
                <label class="w-full" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        Nome
                    </label>

                    <x-input-ecommerce wire:model="name" id="name" type="text" class="@error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required
                        placeholder="insira seu nome aqui"></x-input-ecommerce>

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

                    <x-input-ecommerce wire:model="email" id="email" type="email" class="@error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required
                        placeholder="insira seu email aqui"></x-input-ecommerce>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>

                <label class="w-56" for="">
                    <label class="font-semibold text-md text-gray-600 uppercase tracking-widest">
                        telefone
                    </label>

                    <x-input-ecommerce wire:model="phone" id="phone" type="tel" class="@error('phone') is-invalid @enderror"
                        name="phone" value="{{ old('phone') }}" required
                        placeholder="insira seu número aqui"></x-input-ecommerce>

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
            </div>


            <div class="flex justify-center mt-4">
                <button wire:click="atualizar()" type="submit" class="px-4 py-2 border rounded-md bg-purple-600 text-white font-semibold">
                    {{ __('Salvar') }}
                </button>
            </div>

        </div>

    </div>
</div>
