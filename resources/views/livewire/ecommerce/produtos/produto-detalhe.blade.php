<div>
    @if ($produto)
        <div class="relative flex flex-col items-center py-5 m-8 mt-5 bg-white rounded md:flex-row">
            <div class="m-4 px-4 w-2/3 ">

                <div class="pt-2">
                    {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto->COD_SEQ]) --}}
                </div>

            </div>
            <div class="px-8 md:flex-2 w-2/4">
                <h2 class="mb-1 text-2xl text-center font-bold uppercase tracking-widest leading-tight md:text-2xl">
                    {{ $produto->nome }}
                </h2>
                <p class="text-sm uppercase font-semibold tracking-wider text-gray-500">{{ $produto->descricao }}</p>

                {{-- <p class="text-lg font-semibold tracking-wider">Código: {{$produto->id}} </p> --}}

                <div class="flex items-center my-4 space-x-4">
                    <div>
                        <div class="flex py-2  rounded-lg">
                            @if ($produto->promocao == 'S')
                                <div class="flex flex-col">
                                    <span class="text-md font-bold line-through text-gray-500">
                                        R${{ number_format($produto->preco, 2, ',') }}
                                    </span>
                                    <span class="text-3xl font-bold text-blue-500">
                                        R${{ number_format($produto->valor_promocao, 2, ',') }}
                                    </span>
                                </div>
                            @else
                                <span
                                    class="text-3xl font-bold text-blue-500">R${{ number_format($produto->preco, 2, ',') }}</span>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="h-auto max-h-40 overflow-y-auto my-2 p-2 border rounded">
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

                <div class="my-2">
                    <textarea wire:model="observacao" class="w-full text-xs font-semibold tracking-widest uppercase pt-2 pl-1 border rounded focus:ring-2 focus:ring-gray-200"
                        placeholder="Adicione uma observação..." id="" rows="3"></textarea>
                </div>


                <div class="flex flex-col my-2">
                    <div class="flex flex-row items-center justify-start">
                        <p class="text-sm uppercase font-bold tracking-widest text-gray-600">Valor Total:</p>
                        <p class="ml-2 text-md font-semibold text-blue-600">R${{ number_format($total, 2, ',') }}</p>
                    </div>
                </div>

                <div class="flex gap-1">
                    <div class="flex justify-center border rounded bg-white">
                        <button wire:click="remover()" class="p-1 rounded-full hover:bg-gray-100">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M19 11H5V13H19V11Z"></path>
                            </svg>
                        </button>

                        <input disabled class="w-4 mx-2 text-center" type="text" value="{{ $quantidade }}">

                        <button wire:click="add()" class="p-1 rounded-full hover:bg-gray-100">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                            </svg>
                        </button>
                    </div>

                    @php
                        if ($produto->promocao == 'S') {
                            $valor = $produto->valor_promocao;
                        } else {
                            $valor = $produto->preco;
                        }
                    @endphp

                    <button
                        x-on:click="Livewire.dispatchTo('ecommerce.ecommerce.carrinho-botao', 'adicionarItem', {codigo:'{{ $produto->id }}', nome:'{{ $produto->nome }}', descricao:'{{ $produto->descricao }}', observacao:'{{ $observacao }}', quantidade: '{{ $quantidade }}', preco:'{{ $valor }}'})"
                        class="flex justify-center w-full gap-2 py-2 uppercase font-semibold text-sm bg-purple-600 text-white border rounded">
                        <span>Adicionar ao carrinho</span>

                    </button>
                </div>

            </div>
        </div>
        {{-- <div class="flex items-center gap-4">
            <span class="text-left font-semibold tracking-widest">Compartilhe: </span>
            <div>
                <a href="https://api.whatsapp.com/send?text=Confira o nosso produto {{ $produto->DESCRICAO }} no link: {{ request()->url() }}"
                    rel="{{ request()->url() }}" title="Compartilhar no WhatsApp" target="_blank"
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-full active:bg-green-600 hover:bg-green-700 focus:shadow-outline-green"
                    aria-label="Edit">

                    <span class="content-center mr-1 text-lg font-bold text-center text-white">What's App</span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 p-1 border border-white rounded-full"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                </a>
            </div>
            <div>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url() }}"
                    rel="{{ request()->url() }}" title="Compartilhar no Facebook" target="_blank"
                    class="flex items-center justify-center p-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-700 border border-transparent rounded-full active:bg-green-600 hover:bg-blue-800 focus:shadow-outline-green"
                    aria-label="Edit">
                    <span class="content-center text-xl font-bold text-center text-white">Facebook</span>
                </a>
            </div>

        </div> --}}
    @else
        <div class="flex flex-col gap-8 p-4 my-10 text-center">
            <h1>Ops, aconteceu algum problema ao achar o produto</h1>
            <div>
                <a href="{{ route('tenant.ecommerce.produtos.index', ['prefix' => tenant()->CLIENTE_SUBDOMINIO]) }}"
                    class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:shadow-outline-blue">
                    Visualizar Outros Produtos
                </a>
            </div>
        </div>
    @endif
</div>
