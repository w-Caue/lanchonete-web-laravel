<div>
    
    <x-modal title="Cadastro">
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-3">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Nome</p>

                        <x-input wire:model="form.nome" class="w-full"></x-input>
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
