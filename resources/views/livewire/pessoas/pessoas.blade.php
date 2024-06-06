<div class="">

    

    <x-modal title="Cadastro">
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-4">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Nome *</p>
                        <x-input wire:model="form.name" placeholder="Insira o nome aqui" class="w-full"></x-input>
                    </label>

                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Email</p>
                        <x-input wire:model="form.email" placeholder="Insira o email aqui" class="w-full" type="email"></x-input>
                    </label>

                    <label class="max-w-48">
                        <p class="text-sm font-semibold uppercase text-gray-100">Telefone</p>
                        <x-input wire:model="form.phone" placeholder="Insira o número aqui" class="w-full" type="tel"></x-input>
                    </label>

                    <div class="flex justify-center">
                        <button type="submit" class="p-2 font-semibold text-white rounded bg-green-600">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        @endslot
    </x-modal>
</div>
