<div>
    <div class="bg-indigo-500 py-1 mx-auto text-center">
        <div class="flex justify-center m-2">

        </div>
    </div>
    {{-- @if ($totalItens > 0) --}}
    <div class="flex flex-col my-10 mx-7 shadow-md md:flex-row">

        <div class="w-full px-10 py-10  bg-white dark:bg-gray-700 md:w-3/4">
            <div class="flex justify-between pb-8 border-b">
                <h1 class="text-2xl font-semibold">Carrinho</h1>
                <h2 class="text-2xl font-semibold">{{ $totalItens ?? '' }} Itens</h2>
            </div>
            <div class="flex justify-between mt-5">
                <h3 class="w-2/5 text-xs font-semibold uppercase">Detalhe</h3>
                <h3 class="w-1/5 text-xs font-semibold text-center uppercase">Quantidade</h3>
                <h3 class="w-1/5 text-xs font-semibold text-center uppercase">Total</h3>
            </div>
            @foreach ($carrinho as $produto)
                {{-- {{ dd($produto) }} --}}
                <div class="flex justify-between p-4 -mx-8">
                    <div class="flex w-2/5">
                        <!-- product -->
                        <div class="w-20">
                            {{-- <div class="relative flex justify-center h-24 overflow-hidden rounded ">
                                    @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto['codSeq']], key($produto['codSeq']))
                                </div> --}}
                        </div>
                        <div class="flex flex-col justify-between flex-grow ml-4">
                            <span class="text-sm font-semibold text-blue-500">{{ $produto['descricao'] ?? '' }}</span>
                            <span class="text-md font-bold text-gray-700">{{ $produto['nome'] ?? '' }}</span>
                            <span class="text-sm font-semibold text-blue-500">#{{ $produto['codigo'] ?? '' }}</span>
                            <span class="text-md font-semibold text-green-500">R${{ number_format($produto['preco'], 2, ',') }} </span>
                            <button wire:click="remover({{ $produto['codigo'] }})"
                                class="text-xs font-semibold text-left text-red-500 hover:text-red-600">Remover</button>
                        </div>
                    </div>
                    <div class="flex justify-center w-1/5 my-auto">
                        <button>
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>

                        <span
                            class="w-12 mx-2 font-semibold text-center text-blue-500 text-md">{{ $produto['qtd'] ?? '' }}</span>

                        <input class="w-12 mx-2 text-center border rounded-full" type="text"
                            value="{{ $produto['quantidade'] }}">

                        <button>
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>
                    </div>
                    <span class="w-1/5 text-sm font-semibold text-center">{{ $produto['total'] ?? '' }}</span>
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

        <div id="summary" class="w-full px-8 py-10 bg-gray-100 dark:bg-gray-800 md:w-1/4">
            <div class="mt-8 border-t">
                <div class="flex justify-between py-6 text-sm font-bold uppercase">
                    <span>Total: </span>
                    <span> </span>
                </div>
                {{-- @if (auth()->check() && auth()->user()->CAD_PENDENTE != 'E') --}}
                <a style="background-color:;"
                    class="flex justify-center w-full py-3 text-sm font-semibold text-center text-white uppercase hover:opacity-75">
                    Finalizar Pedido
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
                {{-- @endif --}}

                <a
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500">
                    Voltar à loja
                </a>
            </div>
        </div>
    </div>
    {{-- @else
        <div class="flex flex-col gap-8 p-4 my-10 text-center">
            <h1>Nenhum produto no seu carrinho.😕</h1>
            <h1>É uma boa hora para começar a comprar! 😀</h1>
            <div>
                <a href="{{ route('tenant.ecommerce.produtos.index', ['prefix' => tenant()->CLIENTE_SUBDOMINIO]) }}"
                    style="background-color:#{{ $corSecundaria }};"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:shadow-outline-blue">
                    Visualizar Catálogo de Produtos
                </a>
            </div>
        </div>
    @endif --}}
</div>
