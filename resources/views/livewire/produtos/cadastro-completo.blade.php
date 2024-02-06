<div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <div class="grid grid-cols-3 gap-2">
            <div class="col-span-2">
                <div class=" mt-2">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Codigo</p>
                        <input wire:model="form.codigo"
                            class="p-1 pl-2 w-20 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                            type="text">
                    </label>

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


    </div>
</div>
