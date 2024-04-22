<div class="">
    <button x-cloak x-on:click="openCarrinho = !openCarrinho"
        class="relative inline-flex items-center p-2 m-1 font-semibold text-white align-middle duration-300 bg-purple-800 rounded-full transition-all cursor-pointer text-md hover:scale-95">
        <svg class="w-8 h-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M4 4c0-.6.4-1 1-1h1.5c.5 0 .9.3 1 .8L7.9 6H19a1 1 0 0 1 1 1.2l-1.3 6a1 1 0 0 1-1 .8h-8l.2 1H17a3 3 0 1 1-2.8 2h-2.4a3 3 0 1 1-4-1.8L5.7 5H5a1 1 0 0 1-1-1Z"
                clip-rule="evenodd" />
        </svg>

        {{-- @if ($totalItens != 0) --}}
        <span aria-hidden="true" title="Adicionar ao carrinho"
            class="absolute top-0 right-0 inline-block w-5 h-5 text-xs text-center text-white transform translate-x-1 -translate-y-1 bg-blue-500 border-2 border-white rounded-full">
            {{ $totalItens }}
        </span>
        {{-- @endif --}}
    </button>

    <div x-cloak x-show="openCarrinho" class="absolute my-4 right-10 z-20 px-3 w-96 bg-white border rounded shadow-xl">

        <h1 class="text-md font-semibold uppercase text-center text-purple-800 tracking-widest mb-4">Itens Adicionados
        </h1>

        @if ($carrinho)
            <div style="height: auto; max-height: 16rem;" class="relative overflow-auto">
                @foreach ($carrinho as $produto)
                    <div class="flex flex-col mb-4">
                        <div class="flex items-center justify-between">
                            <!-- product -->
                            <div class="w-20">
                                <div class="relative flex justify-center h-12 overflow-hidden rounded ">
                                    {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto['codSeq']], key($produto['codSeq'])) --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col justify-start w-full mx-2">
                                <span
                                    class="text-xs uppercase tracking-wider font-semibold text-gray-600">{{ $produto['nome'] }}</span>
                                <span class="text-xs">{{ $produto['descricao'] }}</span>
                            </div>

                            <button wire:click="remover({{ $produto['codigo'] }})"
                                class="text-xs font-semibold text-left text-red-500 hover:text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>

                            </button>
                        </div>
                        <div class="flex justify-between my-1">
                            <div class="flex w-20 border rounded p-1">
                                <button wire:click="removerItem({{ $produto['codigo'] }}, {{ '-1' }})">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path d="M19 11H5V13H19V11Z"></path>
                                    </svg>
                                </button>

                                <span
                                    class="w-12 mx-2 font-semibold text-center text-sm">{{ $produto['quantidade'] }}</span>

                                <button
                                    wire:click="adicionarItem({{ $produto['codigo'] }}, {{ '+1' }}, {{ $produto['preco'] }})">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                    </svg>
                                </button>
                            </div>

                            <span class="w-1/5 text-sm font-semibold text-center text-green-500">
                                R${{ number_format($produto['total'], 2, ',') }}
                            </span>
                        </div>


                    </div>
                @endforeach

            </div>

            <div class="flex justify-between py-6 text-gray-600 font-semibold uppercase border-t">
                <span>Total: </span>
                <span class="text-lg text-green-500">{{ number_format($valorTotal, 2, ',') }}</span>
            </div>

            <div class="flex justify-center w-full m-2">
                <a href="{{ route('ecommerce.pedido') }}"
                    class="text-md font-semibold tracking-widest text-center text-purple-700 p-2 border rounded transition-all hover:scale-95">
                    Finalizar Compra
                </a>
            </div>
        @else
            <div class="flex flex-col items-center text-gray-600 border-t">
                <h1 class="text-sm tracking-wider text-center font-semibold">
                    Nenhum item no carrinho
                </h1>
                <a href=""
                    class="text-sm text-center text-purple-700 font-semibold transition-all hover:underline">
                    Ver cardapio
                </a>
            </div>
        @endif
    </div>

</div>
