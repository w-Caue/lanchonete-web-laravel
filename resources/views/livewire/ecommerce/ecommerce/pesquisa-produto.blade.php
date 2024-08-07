<div class="w-full relative">
    <div class="relative">
        <input wire:model.lazy="search"
            class="block p-3 w-full shadow-md font-semibold rounded-full z-20 text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500"
            placeholder="O que você procura?">

        <button wire:click="updatedCep()"
            class="absolute top-0 right-0 p-3 text-sm text-purple-700 font-medium rounded transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
        </button>
    </div>

    @if (!empty($search))
        <div class="absolute z-50 mt-2 w-full bg-gray-50 border shadow-2xl rounded">
            @if (!empty($produtos))
                @foreach ($produtos as $produto)
                    <a href="{{ route('ecommerce.produto-detalhe', ['codigo' => $produto->id]) }}">
                        <div class="flex items-center justify-between px-2 py-4 border-b hover:bg-gray-200 cursor-pointer">
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
                                    class="text-xs uppercase tracking-wider font-semibold text-gray-600">{{ $produto->nome }}</span>
                                <span class="text-xs">{{ $produto->descricao }}</span>
                            </div>

                            @if ($produto->promocao == 'S')
                                <div class="flex items-end gap-1">
                                    <span
                                        class="text-xs line-through font-semibold text-red-500">R${{ number_format($produto->preco, 2, ',') }}</span>
                                    <span
                                        class="text-md font-semibold text-green-500">R${{ number_format($produto->valor_promocao, 2, ',') }}</span>
                                </div>
                            @else
                                <span
                                    class="text-md font-semibold text-green-500">R${{ number_format($produto->preco, 2, ',') }}</span>
                            @endif
                        </div>
                    </a>
                @endforeach
            @else
                <div class="text-center font-semibold tracking-widest p-1">
                    <h1>Não existe nenhum produto com esse nome!</h1>
                </div>
            @endif
        </div>
    @endif

</div>
