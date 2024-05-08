<div>

    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">

        <div class="w-full px-10 py-5 rounded-md shadow-md bg-white md:w-2/3">

            @foreach ($carrinho as $produto)
                <div class="relative flex justify-between items-center p-2 -mx-8 my-1 ">
                    <div class="flex w-2/5">
                        <!-- product -->
                        <div class="w-20">
                            <div class="relative flex justify-center h-20 overflow-hidden rounded ">
                                {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto['codSeq']], key($produto['codSeq'])) --}}
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-col justify-center ml-4">
                            <span
                                class="text-sm tracking-widest font-semibold uppercase text-gray-600">{{ $produto['nome'] ?? '' }}</span>
                            <span
                                class="text-sm tracking-widest font-semibold text-purple-700">{{ $produto['descricao'] ?? '' }}</span>
                            <span
                                class="text-md font-semibold text-green-500">R${{ number_format($produto['preco'], 2, ',') }}
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5 my-auto">
                        <button wire:click="removerItem({{ $produto['codigo'] }}, {{ '-1' }})" class="">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M19 11H5V13H19V11Z"></path>
                            </svg>
                        </button>


                        <input class="w-12 mx-2 p-1 text-center font-semibold text-gray-600 border rounded-full"
                            type="text" value="{{ $produto['quantidade'] }}">

                        <button
                            wire:click="adicionarItem({{ $produto['codigo'] }}, {{ '+1' }}, {{ $produto['preco'] }})"
                            class="">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                            </svg>
                        </button>
                    </div>
                    <span
                        class="w-1/5 text-lg tracking-widest font-semibold uppercase text-green-500 text-center">R${{ number_format($produto['total'], 2, ',') }}</span>

                    {{-- REMOVER --}}
                    <button wire:click="remover({{ $produto['codigo'] }})"
                        class="absolute top-1 right-0 text-gray-500 hover:text-red-500">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z">
                            </path>
                        </svg>
                    </button>
                </div>
            @endforeach

        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-1/3">
            <div
                class="flex justify-between py-4 text-md tracking-widest font-semibold uppercase text-gray-600 border-b">
                <span>total: </span>
                <span>R${{ number_format($valorTotal, 2, ',', '') }} </span>
            </div>

            <a href="{{ route('ecommerce.cliente') }}"
                class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                Fechar Carrinho
            </a>


            <a href="{{ route('ecommerce.produtos') }}"
                class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-gray-300 uppercase border rounded border-gray-300 bg-white hover:text-white transition-all delay-100 hover:bg-blue-500 hover:border-blue-500">
                Voltar à loja
            </a>
        </div>

    </div>

</div>
