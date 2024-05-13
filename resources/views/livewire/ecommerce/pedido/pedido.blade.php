<div>
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">
        <div class="w-full md:w-2/3">

            <div class="rounded-md shadow-md bg-white px-10 py-5">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">Itens</h1>

                @foreach ($carrinho as $produto)
                    <div class="relative flex justify-between items-center p-2 -mx-8 my-1 ">
                        <div class="flex w-2/5">
                            <!-- product -->
                            <div class="w-20">
                                <div class="relative flex justify-center h-16 overflow-hidden rounded ">
                                    {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto['codSeq']], key($produto['codSeq'])) --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center ml-4 cursor-pointer">
                                <span class="text-sm tracking-widest font-semibold uppercase text-gray-600">
                                    {{ $produto['nome'] ?? '' }}
                                </span>

                                <span class="text-sm tracking-widest font-semibold text-purple-700">
                                    {{ $produto['descricao'] ?? '' }}
                                </span>

                                <span
                                    class="text-md font-semibold text-green-500">R${{ number_format($produto['preco'], 2, ',') }}
                                </span>

                            </div>
                        </div>
                        <div class="flex justify-center w-1/5 my-auto">

                            <input class="w-12 mx-2 p-1 text-center font-semibold text-gray-600 border rounded-full"
                                disabled value="{{ $produto['quantidade'] }}">

                        </div>
                        <span
                            class="w-1/5 text-lg tracking-widest font-semibold uppercase text-green-500 text-center">R${{ number_format($produto['total'], 2, ',') }}</span>


                    </div>
                @endforeach
            </div>

            {{-- <div class="rounded-md shadow-md bg-white px-10 py-5 mt-10">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">Observação do Pedido</h1>
    
                <div class="">
                    <h1 class="uppercase tracking-wide text-gray-600 text-md font-semibold">
                        Observação:
                    </h1>
    
                    <textarea class="w-2/3 text-xs text-gray-600 font-semibold tracking-widest uppercase pt-2 pl-2 border-2 rounded-md" name="" id="" placeholder="..." rows="10"></textarea>
    
    
                    
                </div>
    
            </div> --}}

            <div class="rounded-md shadow-md bg-white px-10 py-5 mt-10">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">Endereço</h1>

                <div class="flex justify-between">
                    <div class="flex items-center gap-3">
                        <button>
                            <svg class="w-16 h-16 text-purple-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>


                        <div>

                            @if ($enderecos)
                                <h1 class="uppercase tracking-wide text-gray-600 text-md font-semibold">
                                    {{ $enderecos->endereco }}
                                </h1>

                                <span class="uppercase tracking-wide text-gray-500 text-sm font-semibold">
                                    {{ $enderecos->bairro }} - {{ $enderecos->cidade }} / {{ $enderecos->cep }}
                                </span>
                            @endif


                        </div>

                    </div>

                    <button wire:click="endereco()"
                        class="uppercase tracking-wide text-gray-500 text-sm font-semibold transition-all hover:underline">
                        Alterar
                    </button>
                </div>

            </div>

            <div class="rounded-md shadow-md bg-white px-10 py-5 mt-10">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-4">Detalhe do Pagamento</h1>

                <div class="flex justify-between">
                    <div class="flex items-center gap-3">
                        {{-- <button>
                            <svg class="w-16 h-16 text-purple-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button> --}}

                        <h1 class="uppercase tracking-wide text-gray-600 text-md font-semibold">Forma de Pagamento:</h1>

                        <span class="uppercase tracking-wide text-gray-500 text-sm font-semibold">
                            {{ $pagamento }}
                        </span>

                    </div>

                    <button wire:click="pagamentoPedido()"
                        class="uppercase tracking-wide text-gray-500 text-sm font-semibold transition-all hover:underline">
                        Alterar
                    </button>
                </div>

            </div>
        </div>

        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-1/3">
            <div
                class="flex justify-between py-4 text-sm tracking-widest font-semibold uppercase text-gray-600 border-b">
                <span>produtos: </span>
                <span>R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            <div class="flex flex-col py-4 text-md tracking-widest font-semibold uppercase text-gray-600 border-b">
                <span class="mb-3">forma de pagamento: </span>

                <div class="flex justify-between text-sm">
                    <span class="text-gray-500">{{ $pagamento }}:</span>
                    <span>R${{ number_format($valorProdutos, 2, ',', '') }} </span>
                </div>
            </div>

            <div class="flex justify-between py-4 text-lg tracking-widest font-semibold uppercase text-gray-600">
                <span>total: </span>
                <span class="text-xl text-green-500">R${{ number_format($valorProdutos, 2, ',', '') }} </span>
            </div>

            <button wire:click="finalizar()"
                class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                Finalizar Compra
            </button>
        </div>

    </div>
</div>
