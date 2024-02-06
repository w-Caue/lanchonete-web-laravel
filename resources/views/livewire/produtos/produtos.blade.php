<div>

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
                        <p class="text-sm font-semibold uppercase text-gray-100">Descrição</p>
                        <x-input wire:model="form.descricao" class="w-full"></x-input>
                    </label>

                    <div class="flex gap-2">
                        <label class="max-w-20">
                            <p class="text-sm font-semibold uppercase text-gray-100">Preço</p>
                            <x-input wire:model="form.preco" class="w-full" type="number"></x-input>
                        </label>

                        <label class="max-w-36">
                            <p class="text-sm font-semibold uppercase text-gray-100">Categoria</p>

                            <select wire:model='form.categoria'
                                class="p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                                <option value="">Selecione</option>

                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="max-w-36">
                            <p class="text-sm font-semibold uppercase text-gray-100">Marca</p>

                            <select wire:model='form.categoria'
                                class="p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                                <option value="">Selecione</option>

                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                @endforeach
                            </select>
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
