<div>
    
    <x-modal title="Cadastro">
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-4">
                    <label class="w-full">
                        <p class="font-semibold text-sm text-white uppercase tracking-widest mb-1">
                            Descrição
                        </p>

                        <x-input wire:model="form.descricao" placeholder="Descrição do Encarte" class="w-full"></x-input>
                    </label>

                    <div class="">
                        <p class="text-sm font-semibold uppercase text-gray-100 mb-1">Periodo da Promoção</p>

                        <label class="flex flex-col sm:items-center gap-2 sm:flex-row">
                            <x-input wire:model="form.dataInicio" class="max-w-36" type="date"></x-input>

                            <p class="text-sm tracking-wider font-semibold text-gray-500">Até</p>

                            <x-input wire:model="form.dataFinal" class="max-w-36" type="date"></x-input>
                        </label>
                    </div>

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
