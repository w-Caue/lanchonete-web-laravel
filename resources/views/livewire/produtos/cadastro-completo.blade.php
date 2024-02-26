<div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <div class="grid grid-cols-3 gap-2">
            <div class="col-span-2">
                <div class=" mt-2">

                    <div class="flex justify-between">
                        <label for="">
                            <p class="text-sm font-semibold uppercase text-gray-100">Codigo</p>
                            <input wire:model="form.codigo"
                                class="p-1 pl-2 w-20 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                                type="text">
                        </label>

                        <label class="flex items-center gap-1 ml-5">
                            <input wire:model="form.ecommerce"
                                class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-blue-600 checked:bg-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-white"
                                type="checkbox" value="S" />
            
                            <span class="text-sm font-semibold uppercase text-gray-100">Ecommerce</span>
                        </label>
                    </div>

                    <label class="my-2">
                        <p class="text-sm font-semibold uppercase text-gray-100">Nome</p>
                        <x-input wire:model="form.nome" class="w-full"></x-input>
                    </label>

                    <label class="my-2">
                        <p class="text-sm font-semibold uppercase text-gray-100">Decrição</p>
                        <x-input wire:model="form.descricao" class="w-full"></x-input>
                    </label>
                </div>
            </div>
            <div>
                <div class="flex items-center justify-center w-full mt-2">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-44 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6 text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 mb-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>

                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique
                                    para inserir</span></p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG
                            </p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
            </div>

        </div>

        <div class="flex gap-3 my-5">
            <label class="">
                <p class="text-sm font-semibold uppercase text-gray-100">preço</p>
                <x-input wire:model="form.preco" class="w-20" type=""></x-input>
            </label>

            <label class="max-w-48">
                <p class="text-sm font-semibold uppercase text-gray-100">Categoria</p>

                <select wire:model='form.categoria'
                    class="w-44 p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                    <option value="">Selecione</option>

                    {{-- @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach --}}
                </select>
            </label>

            <label class="max-w-48">
                <p class="text-sm font-semibold uppercase text-gray-100">marca</p>

                <select wire:model='form.marca'
                    class="w-44 p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                    <option value="">Selecione</option>

                    {{-- @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach --}}
                </select>
            </label>

            <label class="max-w-48">
                <p class="text-sm font-semibold uppercase text-gray-100">grupo</p>

                <select wire:model='form.grupo'
                    class="w-44 p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                    <option value="">Selecione</option>

                    {{-- @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach --}}
                </select>
            </label>

            <label class="">
                <p class="text-sm font-semibold uppercase text-gray-100">Data do Cadastro</p>
                <x-input wire:model="form.dataCad" class="w-40" type="date" disabled></x-input>
            </label>

        </div>

        <div>
            <button wire:click="edit()"
                class="text-white bg-green-600 hover:bg-green-700 font-medium rounded text-sm px-3 py-2 transition-all hover:scale-95"
                type="button">
                Salvar
            </button>
        </div>

    </div>
</div>
