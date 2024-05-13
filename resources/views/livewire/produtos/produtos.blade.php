<div>

    <div class="absolute right-2">
        <button x-data x-on:click="$dispatch('open-modal')"
            class="text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 transition-all hover:scale-105"
            type="button">
            Novo Cadastro
        </button>
    </div>

    <x-modal title="Cadastro">
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-3">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Nome</p>
                        <x-input placeholder="Insira o nome aqui" wire:model="form.nome" class="w-full"></x-input>
                    </label>

                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Descrição</p>
                        <x-input placeholder="Insira a descrição aqui" wire:model="form.descricao" class="w-full"></x-input>
                    </label>

                    <div class="flex items-center gap-2">
                        <label class="max-w-20">
                            <p class="text-sm font-semibold uppercase text-gray-100">Preço</p>
                            <x-input placeholder="Valor" wire:model="form.preco" class="w-full" type="number"></x-input>
                        </label>

                        <label class="max-w-36">
                            <p class="text-sm font-semibold uppercase text-gray-100">Categoria</p>

                            <select wire:model='form.categoria'
                                class="p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                                <option class="font-semibold text-sm text-gray-300" value="">Selecione</option>

                                @foreach ($categorias as $categoria)
                                    <option class="font-semibold text-sm text-gray-300" value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                                @endforeach
                            </select>
                        </label>

                        <label class="flex items-center gap-1 ml-5">
                            <input wire:model='form.ecommerce'
                                class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-blue-600 checked:bg-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-white"
                                type="checkbox" />

                            <span class="text-sm font-semibold uppercase text-gray-100">Ecommerce</span>
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
