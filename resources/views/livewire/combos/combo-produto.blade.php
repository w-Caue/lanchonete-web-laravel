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

                        {{-- <label class="flex items-center gap-1 ml-5">
                            <input wire:model="form.ecommerce"
                                class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-blue-600 checked:bg-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-white"
                                type="checkbox" value="S" />

                            <span class="text-sm font-semibold uppercase text-gray-100">Ecommerce</span>
                        </label> --}}
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

        <div>
            @if ($combo->ativo == 'N')
                <button x-data x-on:click="$dispatch('open-modal')"
                    class="flex gap-1 mt-2 text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded text-md p-2 transition-all hover:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                        <path fill-rule="evenodd"
                            d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z"
                            clip-rule="evenodd" />
                    </svg>

                    Adicionar
                </button>
            @endif
        </div>

        <div class="w-full mt-5 overflow-hidden rounded-lg shadow-xs hidden sm:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-600 bg-gray-50 dark:text-gray-300 dark:bg-gray-700">
                            <th class="px-3 py-2">
                                <div class="flex items-center cursor-pointer" wire:click="sortFilter('id')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                    @include('includes.icon-filter', ['field' => 'id'])
                                </div>
                            </th>
                            <th class="px-3 py-2">
                                <div class="flex items-center cursor-pointer" wire:click="sortFilter('Nome')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                    @include('includes.icon-filter', ['field' => 'nome'])
                                </div>
                            </th>

                            <th class="px-3 py-2">
                                <div class="flex items-center cursor-pointer" wire:click="sortFilter('Preco')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Preço</button>
                                    @include('includes.icon-filter', ['field' => 'preco'])
                                </div>
                            </th>
                            <th class="px-3 py-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-600 dark:bg-gray-700">
                        @foreach ($combo->produtos as $produto)
                            <tr wire:key="{{ $produto->id }}"
                                class="text-gray-700 text-sm font-semibold dark:text-gray-300">
                                <td class="px-2 py-2">
                                    #{{ $produto->id }}
                                </td>

                                <td class="px-2 py-2">
                                    <p class="">{{ $produto->nome }}</p>
                                </td>

                                <td class="px-2 py-2">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-500 bg-green-100 rounded-full dark:bg-green-700 dark:text-blue-100">
                                        R${{ number_format($produto->preco, 2, ',', '.') }}
                                    </span>
                                </td>

                                <td class="px-2 py-2">
                                    <div class="flex items-center space-x-2">
                                        @if (true)
                                            <button wire:click="removerProduto({{ $produto->id }})"
                                                class="flex items-center justify-between px-2 py-2 font-medium leading-5 text-blue-600 rounded-lg hover:scale-95 dark:hover:text-blue-600
                                             dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr
                            class="font-semibold text-sm text-gray-500 border-t dark:border-gray-600 bg-gray-50 dark:text-gray-400 dark:bg-gray-700">
                            <th class="">Total</th>
                            <td class="px-2 py-2">{{ $countProdutos }}</td>
                            <td class="px-2 py-2">R${{ number_format($totalProdutos, 2, ',', '.') }}</td>
                            <td class="px-2 py-2"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="flex gap-3 mt-4">
            <button wire:click="update()"
                class="text-white bg-green-600 hover:bg-green-700 font-medium rounded text-sm px-3 py-2 transition-all hover:scale-95"
                type="button">
                Salvar
            </button>

            @if ($combo->ativo == 'N')
                <button x-on:click="$dispatch('open-detalhe', { name : 'ativar' })"
                    class="flex gap-1 text-white bg-purple-500 hover:bg-purple-700 font-medium rounded text-sm px-3 py-2 transition-all hover:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                            clip-rule="evenodd" />
                    </svg>

                    Ativar Combo
                </button>
            @endif
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
                        <div wire:key="{{ $produto->id }}" wire:click="produtoCombo({{ $produto->id }})" x-data
                            x-on:click="$dispatch('open-detalhe', { name : 'detalhe' })"
                            class="grid grid-cols-2 w-64 my-2 bg-gray-700 rounded p-2 transition-all hover:scale-95 cursor-pointer">
                            <div class="m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 24 24" class="h-20">
                                    <path
                                        d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                </svg>
                            </div>
                            <div class="flex flex-col w-36 m-1 dark:text-white">

                                <span class="text-blue-500 font-semibold">#{{ $produto->id }}</span>

                                <div class="flex justify-between">
                                    <p class="flex flex-wrap font-semibold">{{ $produto->nome }}</p>
                                </div>

                                <div class="flex justify-between items-center mt-3">
                                    @if ($produto->preco > 0)
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-300 rounded-full dark:bg-green-700 dark:text-green-100">
                                            R${{ number_format($produto->preco, 2, ',') }}
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-300 rounded-full dark:bg-red-700 dark:text-green-100">
                                            R${{ $produto->preco }}
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
                    <p class="text-xl text-green-400 font-bold">R${{ $produtoDetalhe->preco ?? '' }}</p>

                    <button wire:click="adicionarProduto()"
                        class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white transition-all hover:scale-95">
                        <span>Adicionar</span>

                    </button>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>

    <x-modal-detalhe name="ativar" title="{{ $combo->nome }}">
        @slot('body')
            <form wire:submit="ativar()" class="my-3">
                <label for="">
                    <x-input wire:model.live="descricao" class="w-full " placeholder="Descrição do Combo"></x-input>
                </label>

                <div class="flex my-1">
                    <h1 class="text-md font-semibold dark:text-gray-500">
                        (
                        @foreach ($combo->produtos as $produto)
                            {{ $produto->nome }},
                        @endforeach
                        )
                    </h1>

                    <label class="flex items-center gap-1 ml-5">
                        <input wire:model=""
                            class="h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-gray-400 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-blue-600 checked:bg-blue-600 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-white"
                            type="checkbox" value="S" />

                        <span class="text-md font-semibold dark:text-gray-400">Descrição Principal</span>
                    </label>
                </div>


                <div class="flex flex-col gap-3 mt-4 p-3 border rounded border-gray-600">
                    <div class="flex justify-between">
                        <h1 class="text-lg font-semibold text-gray-400">
                            Valor Total:
                        </h1>

                        <h1 class="text-lg font-semibold dark:text-white">
                            R${{ number_format($totalProdutos, 2, ',', '.') }}
                        </h1>
                    </div>

                    <div class="flex justify-between">
                        <h1 class="text-lg font-semibold text-gray-400">
                            Desconto:
                        </h1>

                        <x-input wire:model="desconto" class="w-20 p-1" placeholder="%"></x-input>
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="button" wire:click="ativar()"
                        class="flex gap-1 mt-2 text-white bg-purple-500 hover:bg-purple-700 font-medium rounded text-md p-2 transition-all hover:scale-95">
                        Ativar
                    </button>
                </div>
            </form>
        @endslot
    </x-modal-detalhe>

</div>
