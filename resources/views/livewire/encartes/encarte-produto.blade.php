<div>
    <div class="text-sm font-semibold p-2 bg-gray-800 rounded">
        <div class="my-1 flex justify-between">
            <h1 class="text-blue-500">#{{ $encarteDetalhe->id }}</h1>
            <h1 class="text-gray-500">{{ date('d/m/Y', strtotime($encarteDetalhe->created_at)) }}</h1>
        </div>
        <label class="my-1">
            <h1 class="text-lg text-gray-200">{{ $encarteDetalhe->descricao }}</h1>
        </label>
        <div class="my-1 flex gap-7">
            <label for="" class="text-md dark:text-gray-300">
                <p>Data Inicio</p>
                <x-input value="{{ date('Y-m-d', strtotime($encarteDetalhe->data_inicio)) }}" class="w-32"
                    type="date" disabled></x-input>
            </label>

            <label for="" class="text-md dark:text-gray-300">
                <p>Data Final</p>
                <x-input value="{{ date('Y-m-d', strtotime($encarteDetalhe->data_final)) }}" class="w-32"
                    type="date" disabled></x-input>
            </label>
        </div>
    </div>

    <button x-data x-on:click="$dispatch('open-modal')"
        class="mt-2 text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded text-sm px-5 py-2.5 transition-all hover:scale-105">
        Pesquisa do Produto
    </button>

    {{-- Pesquisar Produto --}}
    <x-modal>
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex justify-center gap-3">
                    <label for="">
                        <p class="font-semibold dark:text-white">Código</p>
                        <x-input class="w-20" type="number"></x-input>
                    </label>

                    <label for="">
                        <p class="font-semibold dark:text-white">Produto</p>

                        <div class="flex items-center">
                            <x-input class="w-56"></x-input>
            
                            <button type="button" x-data x-on:click="$dispatch('open-detalhe', { name : 'clientes' })"
                                class="p-2 text-white bg-blue-500 rounded-r border-2 border-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>
            
                            </button>
                        </div>
                    </label>
                </form>
            </div>
        @endslot
    </x-modal>

    {{-- <div class="flex gap-4 justify-center">
        <label for="">
            <p class="font-semibold dark:text-white">Código</p>
            <x-input class="w-20" type="number"></x-input>
        </label>

        <label for="">
            <p class="font-semibold dark:text-white">Produto</p>
            <div class="flex items-center">
                <x-input class="w-96"></x-input>

                <button type="button" x-data x-on:click="$dispatch('open-detalhe', { name : 'clientes' })"
                    class="p-2 text-white bg-blue-500 rounded-r border-2 border-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>

                </button>
            </div>
        </label>
    </div> --}}
</div>
