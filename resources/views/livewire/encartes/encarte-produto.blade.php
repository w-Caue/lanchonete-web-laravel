<div>

    <div class="flex flex-col items-start gap-5 my-10 mx-1 md:flex-row">

        <div class="w-full md:w-2/3">
            <div class=" text-sm font-semibold bg-gray-800 rounded w-full px-5 py-5 shadow-md">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-500 mb-4">Informações</h1>
                <form wire:submit="">

                    <div class="flex flex-col gap-5 sm:flex-row">
                        <label class="w-full sm:w-1/3">
                            <p class="font-semibold text-md text-white uppercase tracking-widest mb-1">
                                Descrição do Encarte
                            </p>

                            <x-input disabled wire:model="form.descricao" placeholder="Descrição do Encarte"
                                class="w-full"></x-input>
                        </label>

                        <div class="">
                            <p class="text-sm font-semibold uppercase text-gray-100 mb-1">Periodo da Promoção</p>

                            <label class="flex flex-col justify-center sm:items-center gap-2 sm:flex-row">
                                <x-input disabled wire:model="form.dataInicio" class="max-w-36"
                                    type="date"></x-input>

                                <p class="tracking-widest font-semibold text-gray-500">Até</p>

                                <x-input disabled wire:model="form.dataFinal" class="max-w-36" type="date"></x-input>
                            </label>
                        </div>

                    </div>
                </form>

            </div>

            <div class=" text-sm font-semibold bg-gray-800 rounded w-full py-5 shadow-md mt-10">

                <div class="flex justify-between items-start px-5">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-500 mb-4">Itens</h1>

                    @if ($form->encarte->ativo == 'N')
                        <x-button.primary x-data x-on:click="$dispatch('open-modal')"
                            >
                            Adicionar Produto
                        </x-button.primary>
                    @endif

                </div>

                <div class="w-full overflow-hidden mt-5 rounded-lg shadow-xs hidden sm:block">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-300 dark:bg-gray-800">
                                    <th class="py-2">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortFilter('id')">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                            @include('includes.icon-filter', ['field' => 'id'])
                                        </div>
                                    </th>

                                    <th class="py-2">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortFilter('Nome')">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                            @include('includes.icon-filter', ['field' => 'nome'])
                                        </div>
                                    </th>

                                    <th class="py-2">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortFilter('Preco')">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Preço</button>
                                            @include('includes.icon-filter', ['field' => 'preco'])
                                        </div>
                                    </th>

                                    <th class="py-2">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortFilter('Promocao')">
                                            <button class="text-xs font-medium leading-4 tracking-wider uppercase">Valor
                                                Promoção</button>
                                            @include('includes.icon-filter', ['field' => 'promocao'])
                                        </div>
                                    </th>

                                    <th class="py-2">
                                        <div class="flex justify-center items-center cursor-pointer"
                                            wire:click="sortFilter('Quantidade')">
                                            <button
                                                class="text-xs font-medium leading-4 tracking-wider uppercase">Quant.
                                                Prevista</button>
                                            @include('includes.icon-filter', ['field' => 'quantidade'])
                                        </div>
                                    </th>

                                    <th class="py-2">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse ($form->encarte->produtos as $produto)
                                    <tr wire:key="{{ $pessoa->id }}"
                                        class="text-gray-700 font-semibold text-sm dark:text-gray-400">
                                        <td class="py-3 text-sm">
                                            #{{ $produto->id }}
                                        </td>

                                        <td class="py-3">
                                            {{ $produto->nome }}
                                        </td>

                                        <td class="py-3 text-xs">
                                            <span class="px-2 py-1 font-semibold leading-tight  rounded-full">
                                                R${{ number_format($produto->preco, 2, ',', '.') }}
                                            </span>
                                        </td>

                                        <td class="py-3 text-xs text-center">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                R${{ number_format($produto->pivot->valor_promocao, 2, ',', '.') }}
                                            </span>
                                        </td>

                                        <td class="py-3 w-10 text-center">
                                            <h1 class="text-blue-500">{{ $produto->pivot->quantidade_prevista }}
                                            </h1>
                                        </td>

                                        <td class="py-3">
                                            <div class="flex items-center space-x-2 text-sm">
                                                @if ($form->encarte->ativo == 'N')
                                                    <button wire:click="removerProduto({{ $produto->id }})"
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-95 dark:hover:text-blue-600
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
                                @empty
                                    <div class="absolute left-[31%] mt-16 flex justify-center">
                                        <h1
                                            class="text-sm font-semibold text-center tracking-widest uppercase bg-red-200 rounded w-44 p-1 dark:text-red-600">
                                            Sem registros
                                        </h1>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="border my-4 mx-32 dark:border-gray-700"></div>

                <div class="mx-4 py-3">
                    {{-- {{ $pessoas }} --}}
                </div>
            </div>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-gray-800 md:w-1/3">
            <div
                class="flex justify-between py-4 text-xs tracking-widest font-semibold uppercase text-gray-400 border-b border-gray-700">
                <span>total de produtos: </span>
                <span>{{ sizeof($form->encarte->produtos) }}</span>
            </div>

            <div
                class="flex justify-between py-4 text-xs tracking-widest font-semibold uppercase text-gray-400 border-b border-gray-700">
                <span>total em produtos: </span>
                <span> R${{ number_format($totalProdutos, 2, ',') }}</span>
            </div>

            @if ($form->encarte->ativo != 'N')
                <div class="flex justify-between py-4 text-xs tracking-widest font-semibold uppercase text-gray-400">
                    <span>total do encarte: </span>
                    <span> R${{ number_format($totalEncarte, 2, ',') }}</span>
                </div>
            @endif


            @if ($form->encarte->ativo == 'N')
                <button wire:click="ativar()"
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                    Ativar Encarte
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
                        <div wire:key="{{ $produto->id }}" wire:click="produtoEncarte({{ $produto->id }})" x-data
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

                                <span class="text-blue-500">#{{ $produto->id }}</span>

                                <div class="flex justify-between">
                                    <p class="flex flex-wrap font-semibold">{{ $produto->nome }}</p>
                                </div>

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

    <x-modal-detalhe title="{{ $produtoDetalhe->nome ?? '' }}" name="detalhe">
        @slot('body')
            <div class="grid grid-cols-2 my-4">
                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                        <path
                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-3">
                    <h1 class="text-lg font-semibold">{{ $produtoDetalhe->nome ?? '' }}</h1>
                    <p class="text-sm font-semibold text-gray-400">{{ $produtoDetalhe->descricao ?? '' }}</p>
                    <p class="text-lg text-green-400 font-bold">R${{ $produtoDetalhe->preco ?? '' }}</p>

                    <div class="flex gap-2">
                        <label for="">
                            <p class="font-semibold">%</p>
                            <x-input wire:model="porcetagem" class="w-16" type="number"></x-input>
                        </label>

                        <label for="">
                            <p class="font-semibold">Vl. Promoção</p>
                            <x-input wire:model="valorPromocao" class="w-20"></x-input>
                        </label>
                    </div>
                    <label for="">
                        <p class="font-semibold">Quanti. Prevista</p>
                        <x-input wire:model="quantidadePrevista" class="w-16" type="number"></x-input>
                    </label>

                    <button wire:click="adicionarProduto()"
                        class="flex justify-center w-56 gap-2 py-2 font-semibold text-white bg-purple-600 border rounded transition-all hover:scale-95">
                        <span>Adicionar</span>

                    </button>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>

</div>
