<div>
    <div class="text-sm font-semibold p-2 bg-gray-800 rounded">
        <div class="my-1 flex justify-between">
            <h1 class="text-blue-500">#{{ $pedido->id }}</h1>
            <h1 class="text-gray-500">{{ date('d/m/Y', strtotime($pedido->created_at)) }}</h1>
        </div>
        <label class="my-1">
            <h1 class="text-lg text-gray-200">Cliente: {{ $pedido->pessoa->nome }}</h1>
        </label>
        <label class="my-1">
            <h1 class="text-md text-gray-400">Descrição: {{ $pedido->descricao }}</h1>
        </label>
        <label class="my-1">
            <h1 class="text-md text-white bg-gray-700 rounded w-24 text-center"> {{ $pedido->formaPagamento->nome }}</h1>
        </label>
    </div>

    <div class="my-2">
        <button x-data x-on:click="$dispatch('open-produto')"
            class="flex items-center gap-1 text-white font-semibold p-1 rounded bg-blue-600">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd"
                    d="M5 3a1 1 0 0 0 0 2h.7l2.1 10.2a3 3 0 1 0 4 1.8h2.4a3 3 0 1 0 2.8-2H9.8l-.2-1h8.2a1 1 0 0 0 1-.8l1.2-6A1 1 0 0 0 19 6h-2.3c.2.3.3.6.3 1a2 2 0 0 1-2 2 2 2 0 1 1-4 0 2 2 0 0 1-1.7-3H7.9l-.4-2.2a1 1 0 0 0-1-.8H5Z"
                    clip-rule="evenodd" />
                <path fill-rule="evenodd"
                    d="M14 5a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V8h1a1 1 0 1 0 0-2h-1V5Z"
                    clip-rule="evenodd" />
            </svg>

            Adicionar Item
        </button>
    </div>

    <div class="w-full mt-3 overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">#</th>
                        <th class="px-4 py-3">Item</th>
                        <th class="px-4 py-3">Marca</th>
                        <th class="px-4 py-3">Preço</th>
                        <th class="px-4 py-3">Quantidade</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pedido->itens as $item)
                        <tr wire:key="{{ $item->id }}" class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $item->id }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div>
                                        <p class="font-semibold">{{ $item->nome }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $item->descricao }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $item->marca->nome ?? 'Sem' }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{ number_format($item->preco, 2, ',', '.') }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center gap-1">
                                    <button wire:click="removerProduto({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                        </svg>
                                    </button>

                                    <h1 class="bg-gray-700 rounded text-blue-500 px-3">{{ $item->pivot->quantidade }}
                                    </h1>

                                    <button class="" wire:click="adicionarProduto({{ $item->id }})">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 4.5v15m7.5-7.5h-15" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm text-center">
                                {{ number_format($item->pivot->total, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    @if ($pedido->status == 'Aberto')
                                        <button wire:click="excluirProduto({{ $item->id }})"
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
                    @endforeach
                </tbody>
            </table>
            {{-- @php
                $total = 0;
                foreach ($this->pedido->itens as $key => $value) {
                    $total += $value['pivot']['total'];
                }
                $this->totalPedido = $total;
            @endphp
            <h1>{{ $this->totalPedido }}</h1> --}}
        </div>
    </div>

    {{-- Pesquisar Produto --}}
    <div class="flex justify-center">
        <div x-data="{ open: false }" x-show="open" x-cloak x-on:open-produto.window="open = true"
            x-on:close-produto.window="open = false" x-on:keydown.escape.window="open = false"
            x-transition:enter="transition ease-out duration-150" x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            <div x-on:click ="open = false" class="fixed">
            </div>
            <div
                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-6xl">

                <div class="flex justify-between items-center m-1 dark:text-white">
                    <h1 class="text-xl font-semibold text-center"></h1>
                    <button
                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                        aria-label="close" x-on:click="open = false">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                            aria-hidden="true">
                            <path
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex justify-center gap-1">
                    <input wire:model.lazy="searchCli" type="text" name="seach"
                        class="w-80 p-2 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                        value="">
                    <button wire:click="produtos()"
                        class="bg-blue-500 text-white p-2 border border-blue-500 hover:border-transparent rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>

                @if ($produtos)
                    <div class="flex flex-wrap gap-4 justify-center">
                        @foreach ($produtos as $produto)
                            <div wire:key="{{ $produto->id }}"
                                class="grid grid-cols-2 my-4 bg-gray-700 rounded p-2">
                                <div class="m-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                        viewBox="0 0 24 24" class="h-32">
                                        <path
                                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1 dark:text-white">


                                    <span class="text-blue-500">#{{ $produto->id }}</span>

                                    <div class="flex justify-between">
                                        <p class="flex flex-wrap font-semibold">{{ $produto->nome }}</p>
                                        {{-- <p class="text-gray-600 dark:text-gray-400">{{ $produto->marca->nome ?? '' }}</p> --}}
                                    </div>

                                    <p class="flex flex-wrap text-sm text-gray-600 dark:text-gray-400">
                                        {{ $produto->descricao }}
                                    </p>

                                    <div class="flex justify-between items-center mt-1">
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

                                    <button wire:click="adicionarProduto({{ $produto->id }})"
                                        class="flex justify-center w-36 gap-2 py-1 font-semibold text-purple-600 border rounded dark:text-white transition-all hover:scale-95">
                                        <span>Adicionar</span>

                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                            viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M5 3a1 1 0 0 0 0 2h.7l2.1 10.2a3 3 0 1 0 4 1.8h2.4a3 3 0 1 0 2.8-2H9.8l-.2-1h8.2a1 1 0 0 0 1-.8l1.2-6A1 1 0 0 0 19 6h-2.3c.2.3.3.6.3 1a2 2 0 0 1-2 2 2 2 0 1 1-4 0 2 2 0 0 1-1.7-3H7.9l-.4-2.2a1 1 0 0 0-1-.8H5Z"
                                                clip-rule="evenodd" />
                                            <path fill-rule="evenodd"
                                                d="M14 5a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V8h1a1 1 0 1 0 0-2h-1V5Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <div class="mx-7 mt-2">
                            {{ $produtos->links('layouts.paginate') }}
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
