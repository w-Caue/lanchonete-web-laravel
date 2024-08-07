<div>
    <div class="content">
        <div class="wrapper relative mx-7 my-5">
            @if ($encarte)
                
                <button id="left"
                    class="absolute z-10 top-[50%] translate-y-[-50%] left-[-22px] bg-gray-100 p-1 rounded-full btn">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z">
                        </path>
                    </svg>
                </button>

                <div class="carousel ">
                    @foreach ($encarte->produtos as $produto)
                        <div x-data x-on:click="$dispatch('open-detalhe')" wire:click="produto({{ $produto->id }})"
                            wire:key="{{ $produto->id }}"
                            class="card relative flex flex-col items-center text-gray-900 bg-white border border-gray-200 rounded-lg shadow-md md:flex-row transition-all hover:shadow-xl cursor-pointer select-none">

                            <div class="flex justify-center w-full pt-2 px-4">
                                {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto->COD_SEQ]) --}}
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                </svg>
                            </div>
                            <div class="w-full flex flex-col gap-3 p-5">
                                <div class="py-2 text-gray-600">
                                    <h5 class="my-3 text-md uppercase font-semibold tracking-wider">
                                        {{ $produto->nome }}
                                    </h5>
                                    <p class="mb-4 text-xs uppercase font-semibold opacity-65">
                                        {{ $produto->descricao }}
                                    </p>

                                    <div class="flex items-center gap-1 my-4">
                                        <span
                                            class="text-sm line-through font-semibold text-red-500">R${{ number_format($produto->preco, 2, ',', '.') }}</span>
                                        <span
                                            class="text-lg font-semibold text-green-500">R${{ number_format($produto->pivot->valor_promocao, 2, ',', '.') }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <button id="rigth"
                    class="absolute z-10 top-[50%] translate-y-[-50%] right-[-22px] bg-gray-100 p-1 rounded-full btn">
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                        </path>
                    </svg>
                </button>
            @endif
        </div>
    </div>

    <x-modal-detalhe title="{{ $produtoDetalhe->nome ?? '' }}">
        @slot('body')
            <div class="relative grid grid-cols-2 gap-2 my-4">
                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                        <path
                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-1 dark:text-white">

                    <p class="text-sm font-semibold uppercase tracking-widest text-gray-400">
                        {{ $produtoDetalhe->descricao ?? '' }}
                    </p>

                    <div class="flex items-center gap-1">
                        <span
                            class="text-sm line-through font-semibold text-red-500">R${{ $produtoDetalhe->preco ?? '' }}</span>
                        <span
                            class="text-lg font-semibold text-green-500">R${{ $produtoDetalhe->valor_promocao ?? '' }}</span>
                    </div>

                    <div class="h-auto max-h-56 overflow-y-auto my-2 p-2 border rounded">
                        <div>
                            <div class="sticky top-0 ...">A</div>
                            <div>
                                <div>
                                    <img src="..." />
                                    <strong>Andrew Alfred</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Aisha Houston</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Aisha Houston</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Aisha Houston</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Aisha Houston</strong>
                                </div>
                                <!-- ... -->
                            </div>
                        </div>
                        <div>
                            <div class="sticky top-0">B</div>
                            <div>
                                <div>
                                    <img src="..." />
                                    <strong>Bob Alfred</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Bob Alfred</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Bob Alfred</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Bob Alfred</strong>
                                </div>
                                <div>
                                    <img src="..." />
                                    <strong>Bob Alfred</strong>
                                </div>
                                <!-- ... -->
                            </div>
                        </div>
                        <!-- ... -->
                    </div>

                    <div class="absolute bottom-1 flex gap-1">
                        <div class="flex justify-center border rounded bg-white">
                            <button wire:click="remover()" class="p-1 rounded-full hover:bg-gray-100">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M19 11H5V13H19V11Z"></path>
                                </svg>
                            </button>

                            <input class="w-4 mx-2 text-center" type="text" value="{{ $quantidade }}">

                            <button wire:click="add()" class="p-1 rounded-full hover:bg-gray-100">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                </svg>
                            </button>
                        </div>

                        <button
                            x-on:click="Livewire.dispatchTo('ecommerce.ecommerce.carrinho-botao', 'adicionarItem', {codigo:'{{ $produtoDetalhe->id ?? '' }}', nome:'{{ $produtoDetalhe->nome ?? '' }}', descricao:'{{ $produtoDetalhe->descricao ?? '' }}', observacao:'{{ $observacao }}', quantidade: '{{ $quantidade }}', preco:'{{ $produtoDetalhe->valor_promocao ?? '' }}'})"
                            class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white">
                            <span>Adicionar</span>

                        </button>
                    </div>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>
</div>
