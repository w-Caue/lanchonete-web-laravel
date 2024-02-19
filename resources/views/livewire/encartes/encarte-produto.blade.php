<div>
    <div class="text-sm font-semibold p-2 bg-gray-800 rounded">
        <div class="my-1 flex justify-between">
            <h1 class="text-blue-500">#{{ $encarte->id }}</h1>
            <h1 class="text-gray-500">{{ date('d/m/Y', strtotime($encarte->created_at)) }}</h1>
        </div>
        <label class="my-1">
            <h1 class="text-lg text-gray-200">{{ $encarte->descricao }}</h1>
        </label>
        <div class="my-1 flex gap-7">
            <label for="" class="text-md dark:text-gray-300">
                <p>Data Inicio</p>
                <x-input value="{{ date('Y-m-d', strtotime($encarte->data_inicio)) }}" class="w-32"
                    type="date" disabled></x-input>
            </label>

            <label for="" class="text-md dark:text-gray-300">
                <p>Data Final</p>
                <x-input value="{{ date('Y-m-d', strtotime($encarte->data_final)) }}" class="w-32"
                    type="date" disabled></x-input>
            </label>
        </div>
    </div>

    <button x-data x-on:click="$dispatch('open-modal')"
        class="flex gap-1 mt-2 text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded text-md px-3 py-2 transition-all hover:scale-95">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
            <path
                d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
            <path fill-rule="evenodd"
                d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                clip-rule="evenodd" />
        </svg>

        Adicionar Produto
    </button>

    <div class="w-full mt-2 overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-2 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('id')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                @include('includes.icon-filter', ['field' => 'id'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Nome')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                @include('includes.icon-filter', ['field' => 'nome'])
                            </div>
                        </th>
                        
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Preco')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Preço</button>
                                @include('includes.icon-filter', ['field' => 'preco'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Marca')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Valor
                                    Promoção</button>
                                @include('includes.icon-filter', ['field' => 'marca'])
                            </div>
                        </th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                     @foreach ($encarte->produtos as $produto)
                        <tr wire:key="{{ $produto->id }}" class="text-gray-700 font-semibold dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                #{{ $produto->id }}
                            </td>
                            <td class="px-2 py-3">
                                <p class="">{{ $produto->nome }}</p>
                            </td>
                            <td class="px-4 py-3 text-xs">

                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-blue-700 bg-blue-100 rounded-full dark:bg-blue-700 dark:text-blue-100">
                                    {{ number_format($produto->preco, 2, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-xs">

                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ number_format($produto->valor_promocao, 2, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <button wire:click="removerProduto({{ $produto->id }})"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-95 dark:hover:text-blue-600
                                         dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>

    <x-modal title="Produtos">
        @slot('body')
            <div class="flex justify-center gap-1">
                <input wire:model.lazy="searchCli" type="text" name="seach"
                    class="w-80 p-2 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                    value="">
                <button wire:click="pesquisaProdutos()"
                    class="bg-blue-500 text-white p-2 border border-blue-500 hover:border-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>

            @if ($produtos)
                <div class="flex flex-wrap gap-4 justify-center">
                    @foreach ($produtos as $produto)
                        <div wire:key="{{ $produto->id }}" wire:click="produtoEncarte({{ $produto->id }})" x-data
                            x-on:click="$dispatch('open-detalhe', { name : 'detalhe' })"
                            class="grid grid-cols-2 my-4 bg-gray-700 rounded p-2 transition-all hover:scale-95 cursor-pointer">
                            <div class="m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 24 24" class="h-20">
                                    <path
                                        d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col gap-1 m-1 dark:text-white">

                                <span class="text-blue-500">#{{ $produto->id }}</span>

                                <div class="flex justify-between">
                                    <p class="flex flex-wrap font-semibold">{{ $produto->nome }}</p>
                                </div>

                                <p class="flex flex-wrap text-sm text-gray-600 dark:text-gray-400">
                                    {{ $produto->descricao }}
                                </p>

                                <div class="flex justify-between items-center">
                                    @if ($produto->preco > 0)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-300 rounded-full dark:bg-green-700 dark:text-green-100">
                                            {{ number_format($produto->preco, 2, ',') }}
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-300 rounded-full dark:bg-red-700 dark:text-green-100">
                                            {{ $produto->preco }}
                                        </span>
                                    @endif
                                </div>

                            </div>
                        </div>
                    @endforeach

                    {{-- <div class="mx-7 mt-2">
                        {{ $this->produtos->links('layouts.paginate') }}
                    </div> --}}

                </div>
            @endif
        @endslot
    </x-modal>

    <x-modal-detalhe name="detalhe">
        @slot('body')
            <div class="grid grid-cols-2 my-4">
                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                        <path
                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-3 dark:text-white">
                    <h1 class="text-lg font-semibold">{{ $produtoDetalhe->nome ?? '' }}</h1>
                    <p class="text-sm font-semibold text-gray-400">{{ $produtoDetalhe->descricao ?? '' }}</p>
                    <p class="text-lg text-green-400 font-bold">R${{ $produtoDetalhe->preco ?? '' }}</p>

                    <div class="flex gap-2">
                        <label for="">
                            <p class="font-semibold dark:text-white">%</p>
                            <x-input wire:model="porcetagem" class="w-16" type="number"></x-input>
                        </label>

                        <label for="">
                            <p class="font-semibold dark:text-white">Vl. Promoção</p>
                            <x-input wire:model="valorPromocao" class="w-20"></x-input>
                        </label>
                    </div>

                    <button
                        wire:click="adicionarProduto()"
                        class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white transition-all hover:scale-95">
                        <span>Adicionar</span>

                    </button>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>

</div>
