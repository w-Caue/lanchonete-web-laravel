<div>

    <div class="flex flex-col my-10 mx-7 shadow-md md:flex-row">

        <div class="w-full px-10 py-10 rounded-l bg-white dark:bg-gray-700 md:w-3/4">
            <div class="flex justify-between pb-8 border-b dark:text-white">
                <h1 class="text-2xl font-semibold">Carrinho</h1>
                <h2 class="text-2xl font-semibold">{{ $totalItens ?? '' }} Itens</h2>
            </div>
            <div class="flex justify-between mt-5 dark:text-white">
                <h3 class="w-2/5 text-xs font-semibold uppercase">Detalhe</h3>
                <h3 class="w-1/5 text-xs font-semibold text-center uppercase">Quantidade</h3>
                <h3 class="w-1/5 text-xs font-semibold text-center uppercase">Total</h3>
            </div>
            @foreach ($carrinho as $produto)
                <div class="flex justify-between p-4 -mx-8">
                    <div class="flex w-2/5">
                        <!-- product -->
                        <div class="w-20">
                            <div class="relative flex justify-center h-24 overflow-hidden rounded ">
                                {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto['codSeq']], key($produto['codSeq'])) --}}
                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                    viewBox="0 0 24 24">
                                    <path
                                        d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex flex-col justify-between flex-grow ml-4">
                            <span class="text-sm font-semibold text-blue-500">{{ $produto['descricao'] ?? '' }}</span>
                            <span
                                class="text-md font-bold text-gray-700 dark:text-white">{{ $produto['nome'] ?? '' }}</span>
                            <span class="text-sm font-semibold text-blue-500">#{{ $produto['codigo'] ?? '' }}</span>
                            <span
                                class="text-md font-semibold text-green-500">R${{ number_format($produto['preco'], 2, ',') }}
                            </span>
                            <button wire:click="remover({{ $produto['codigo'] }})"
                                class="text-xs font-semibold text-left text-red-500 hover:text-red-600">Remover</button>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5 my-auto">
                        <button class=" dark:text-blue-500">
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>

                        {{-- <span
                            class="w-12 mx-2 font-semibold text-center text-blue-500 text-md">{{ $produto['quantidade'] }}</span> --}}

                        <input class="w-12 mx-2 text-center border rounded-full" type="text"
                            value="{{ $produto['quantidade'] }}">

                        <button class=" dark:text-blue-500">
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>
                    </div>
                    <span
                        class="w-1/5 text-md font-semibold text-green-500 text-center">R${{ number_format($produto['total'], 2, ',') }}</span>
                </div>
            @endforeach


            <a href="{{ route('ecommerce.produtos') }}" class="flex mt-10 text-sm font-semibold text-blue-600">
                <svg class="w-4 mr-2 text-blue-600 fill-current" viewBox="0 0 448 512">
                    <path
                        d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z" />
                </svg>
                Continuar comprando
            </a>
        </div>

        <div id="summary" class="w-full px-8 py-10 rounded-r bg-gray-100 dark:bg-gray-800 md:w-1/4">
            <div class="mt-8 border-t">
                <div class="flex justify-between py-6 text-sm font-bold uppercase dark:text-white">
                    <span>Total: </span>
                    <span>R${{ number_format($valorTotal, 2, ',', '') }} </span>
                </div>
                @if ($carrinho != null)
                    <a href="{{ route('ecommerce.cliente') }}"
                        class="flex justify-center w-full py-3 text-sm font-semibold text-center text-white uppercase hover:opacity-75">
                        Preencher Informações
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </a>
                @endif

                <a
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500">
                    Voltar à loja
                </a>
            </div>
        </div>
    </div>
    
</div>
