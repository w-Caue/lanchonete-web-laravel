<div>
    @include('includes.loading')

    <div class="bg-indigo-500 py-1 mx-auto text-center">
        <div class="flex justify-center m-2">
            <ul class="flex gap-3">
                <li>
                    <button
                        class="inline-flex items-center p-2 text-white rounded-xl cursor-pointer transition-all hover:scale-95">
                        <p class="font-semibold">Todos os Produtos</p>
                    </button>
                </li>
                <li>
                    <button
                        class="inline-flex items-center p-2 text-white rounded-xl cursor-pointer transition-all hover:scale-95">
                        <p class="font-semibold">Promoções</p>
                    </button>
                </li>
                <li>
                    <button
                        class="inline-flex items-center p-2 text-white rounded-xl cursor-pointer transition-all hover:scale-95">
                        <p class="font-semibold">Combos</p>
                    </button>
                </li>
            </ul>
        </div>
    </div>

    <div wire:init="load" class="flex justify-center flex-wrap gap-3 my-4">
        @foreach ($produtos as $produto)
            <div wire:key="{{ $produto->id }}"
                class="flex flex-col items-center text-gray-900 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-80 transition-all cursor-pointer">

                <div class="flex justify-center w-full pt-2 px-4">
                    {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto->COD_SEQ]) --}}
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                        <path
                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                    </svg>
                </div>
                <div class="w-full flex flex-col gap-3 p-4 leading-normal">
                    <div wire:click="produto({{ $produto->id }})" class="py-2">
                        <h5 class="text-xl font-semibold tracking-tight">{{ $produto->nome }}</h5>
                        <p class="my-2 font-semibold text-gray-600">{{ $produto->descricao }}</p>
                        <span
                            class="w-16 font-semibold bg-green-400 p-1 rounded-xl text-white">R${{ number_format($produto->preco, 2, ',', '.') }}</span>

                    </div>

                    <div class="flex justify-center">
                        <button wire:click="removerItem({{ $produto->id }}, {{ '-1' }})"
                            class=" dark:text-blue-500">
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>


                        @foreach ($carrinho as $index => $item)
                            @if ($produto->id == $item['codigo'])
                                <input class="w-12 mx-2 text-center border rounded" type="text"
                                    value="{{ $carrinho[$index]['quantidade'] }}">
                            @endif
                        @endforeach
                        @if ($carrinho == null)
                            <input class="w-12 mx-2 text-center border rounded" type="text" value="0">
                        @endif

                        <button
                            wire:click="adicionarItem({{ $produto->id ?? '' }}, '{{ $produto->nome ?? '' }}', '{{ $produto->descricao ?? '' }}', 1 ,  '{{ $produto->preco ?? '' }}')"
                            class=" dark:text-blue-500">
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

    <div class="mx-6 my-7 bg-gray-50 rounded shadow-lg p-3">
        <div class="py-1 mx-3 w-44">
            <h1 class="text-3xl text-center font-semibold bg-indigo-500 p-1 rounded text-white">Promoções</h1>
        </div>

        @if ($encarte)
            <div wire:init="load" class="flex  flex-wrap gap-3 my-1 mx-5">
                @foreach ($encarte->produtos as $produto)
                    <div wire:key="{{ $produto->id }}"
                        class="flex flex-col items-center text-gray-900 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-80 transition-all cursor-pointer">

                        <div class="flex justify-center w-full pt-2 px-4">
                            {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto->COD_SEQ]) --}}
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                viewBox="0 0 24 24">
                                <path
                                    d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                            </svg>
                        </div>
                        <div class="w-full flex flex-col gap-3 p-4 leading-normal">
                            <div wire:click="produto({{ $produto->id }})" class="py-2">
                                <h5 class="text-xl font-semibold tracking-tight">{{ $produto->nome }}</h5>
                                <p class="my-2 font-semibold text-gray-600">{{ $produto->descricao }}</p>

                                <div>
                                    <span
                                        class="w-10 text-sm line-through font-semibold p-1 rounded-xl text-red-500">R${{ number_format($produto->preco, 2, ',', '.') }}</span>
                                    <span
                                        class="w-16 font-semibold bg-green-400 p-1 rounded-xl text-white">R${{ number_format($produto->pivot->valor_promocao, 2, ',', '.') }}</span>
                                </div>


                            </div>

                            <div class="flex justify-center">
                                <button wire:click="removerItem({{ $produto->id }}, {{ '-1' }})"
                                    class=" dark:text-blue-500">
                                    <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                        <path
                                            d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </button>


                                @foreach ($carrinho as $index => $item)
                                    @if ($produto->id == $item['codigo'])
                                        <input class="w-12 mx-2 text-center border rounded" type="text"
                                            value="{{ $carrinho[$index]['quantidade'] }}">
                                    @endif
                                @endforeach
                                @if ($carrinho == null)
                                    <input class="w-12 mx-2 text-center border rounded" type="text" value="0">
                                @endif

                                <button
                                    wire:click="adicionarItem({{ $produto->id ?? '' }}, '{{ $produto->nome ?? '' }}', '{{ $produto->descricao ?? '' }}', 1 ,  '{{ $produto->valor_promocao ?? '' }}')"
                                    class=" dark:text-blue-500">
                                    <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                        <path
                                            d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mx-6 my-7 bg-gray-50 rounded shadow-lg p-3">
        <div class="flex justify-end py-1 mx-3">
            <h1 class="text-3xl text-center font-semibold bg-red-500 p-1 w-44 rounded text-white">Combos</h1>
        </div>

        @if ($encarte)
            <div wire:init="load" class="flex  flex-wrap gap-3 my-1 mx-5">
                @foreach ($encarte->produtos as $produto)
                    <div
                        class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="p-8 rounded-t-lg" src="/docs/images/products/apple-watch.png"
                                alt="Combo Imagem" />
                        </a>
                        <div class="px-5 pb-5">
                            <a href="#">
                                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">
                                    Apple
                                    Watch Series 7 GPS, Aluminium Case, Starlight Sport
                                </h5>
                            </a>
                            <div class="flex items-center mt-2.5 mb-5">
                                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                    <svg class="w-4 h-4 text-gray-200 dark:text-gray-600" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path
                                            d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z" />
                                    </svg>
                                </div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-3">5.0</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>

                                <div class="flex items-center">
                                    <button wire:click="removerItem({{ $produto->id }}, {{ '-1' }})"
                                        class=" dark:text-blue-500">
                                        <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                            <path
                                                d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                        </svg>
                                    </button>


                                    @foreach ($carrinho as $index => $item)
                                        @if ($produto->id == $item['codigo'])
                                            <input class="w-12 mx-2 p-1 text-center border rounded" type="text"
                                                value="{{ $carrinho[$index]['quantidade'] }}">
                                        @endif
                                    @endforeach
                                    @if ($carrinho == null)
                                        <input class="w-12 mx-2 p-1 text-center border rounded" type="text"
                                            value="0">
                                    @endif

                                    <button
                                        wire:click="adicionarItem({{ $produto->id ?? '' }}, '{{ $produto->nome ?? '' }}', '{{ $produto->descricao ?? '' }}', 1 ,  '{{ $produto->valor_promocao ?? '' }}')"
                                        class=" dark:text-blue-500">
                                        <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                            <path
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <x-modal-detalhe>
        @slot('body')
            <div class="grid grid-cols-2 my-4">
                <div class="m-3">
                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24">
                        <path
                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                    </svg>
                </div>
                <div class="flex flex-col gap-3 dark:text-white">
                    <a href="{{ route('ecommerce.pedido') }}"
                        class="flex justify-center w-56 gap-2 py-2 border rounded font-semibold text-purple-600 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                        <span>Ir Para o Carrinho</span>
                    </a>

                    <h1 class="text-lg font-semibold">{{ $produtoDetalhe->nome ?? '' }}</h1>
                    <p class="text-sm font-semibold text-gray-400">{{ $produtoDetalhe->descricao ?? '' }}</p>
                    <p class="text-lg text-green-400 font-bold">R${{ $produtoDetalhe->preco ?? 2 }}</p>

                    <div>
                        <p>Quant.</p>
                        <input wire:model.live="quantidade" type="number" value="1"
                            class="w-14 text-purple-600 font-semibold text-center bg-gray-100 rounded dark:text-gray-700">
                    </div>

                    <button
                        wire:click="adicionarItem({{ $produtoDetalhe->id ?? '' }}, '{{ $produtoDetalhe->nome ?? '' }}', '{{ $produtoDetalhe->descricao ?? '' }}', '{{ $produtoDetalhe->preco ?? '' }}')"
                        class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white">
                        <span>Adicionar</span>

                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg> --}}
                    </button>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>
</div>
