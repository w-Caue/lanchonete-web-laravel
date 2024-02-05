<div class="">

    <div class="absolute right-2">
        <button x-data x-on:click="$dispatch('open-modal')"
            class="text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 transition-all hover:scale-105"
            type="button">
            Novo Cadastro
        </button>
    </div>

    <x-modal>
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-3">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Nome</p>
                        <x-input wire:model="form.nome" class="w-full"></x-input>
                    </label>

                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Email</p>
                        <x-input wire:model="form.email" class="w-full" type="email"></x-input>
                    </label>

                    <label class="max-w-56">
                        <p class="text-sm font-semibold uppercase text-gray-100">whatsapp</p>
                        <x-input wire:model="form.whatsapp" class="w-full" type="tel"></x-input>
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
