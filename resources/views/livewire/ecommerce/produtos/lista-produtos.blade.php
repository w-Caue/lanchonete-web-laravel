<div>
    @include('includes.loading')


    {{-- <div wire:init="load" class="flex justify-center flex-wrap gap-3 my-4">
        @foreach ($produtos as $produto)
            <div wire:key="{{ $produto->id }}"
                class="flex flex-col items-center text-gray-900 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-80 transition-all cursor-pointer">

                <div class="flex justify-center w-full pt-2 px-4">
                    @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto->COD_SEQ])
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
    </div> --}}

    <h1 class="text-3xl my-7 text-center text-purple-600 font-bold ml-3 tracking-widest uppercase">
        Em Promoção
    </h1>

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
                    @foreach ($encarte->produtos as $key => $produto)
                        <div x-data x-on:click="$dispatch('open-detalhe')" wire:key="{{ $produto->id }}"
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
                                <div wire:click="produto({{ $produto->id }})" class="py-2 text-gray-600">
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

    {{-- <h1 class="text-2xl my-7 text-center text-gray-700 font-semibold ml-3 tracking-widest uppercase">
        Hambúrgueres
    </h1>

    <div class="mx-6 my-7">
        <div wire:init="load" class=" flex flex-wrap gap-3 my-1 mx-5">
            @foreach ($produtos as $produto)
                @if ($produto->categoria_id === 1)
                    <div x-data x-on:click="$dispatch('open-detalhe')" wire:key="{{ $produto->id }}"
                        class=" relative flex flex-col items-center text-gray-900 bg-white border border-gray-200 rounded-lg shadow-md md:flex-row md:w-80 transition-all hover:shadow-xl cursor-pointer">

                        <div class="flex justify-center w-full pt-2 px-4">
                            @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto->COD_SEQ])
                            <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                viewBox="0 0 24 24">
                                <path
                                    d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                            </svg>
                        </div>
                        <div class="w-full flex flex-col gap-3 p-5">
                            <div wire:click="produto({{ $produto->id }})" class="py-2 text-gray-600">
                                <h5 class="my-3 text-md uppercase font-semibold tracking-wider">
                                    {{ $produto->nome }}
                                </h5>
                                <p class="mb-4 text-xs uppercase font-semibold opacity-65">
                                    {{ $produto->descricao }}
                                </p>

                                <div class="flex items-center gap-1 my-4">
                                   
                                    <span
                                        class="text-lg font-semibold text-green-500">R${{ number_format($produto->preco, 2, ',', '.') }}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div> --}}

    <h1 class="text-3xl my-16 text-center text-orange-600 font-bold ml-3 tracking-widest uppercase">
        Combos
    </h1>

    <div class="mx-6 my-7">

        @if ($combos)
            <div wire:init="load" class="flex  flex-wrap gap-3 my-1 mx-5">
                @foreach ($combos as $combo)
                    <div class=" flex flex-col justify-center">
                        <div class="py-3 sm:max-w-lg sm:mx-auto">
                            <div
                                class="bg-white shadow-lg border-gray-100 max-h-80 border sm:rounded-3xl p-8 flex space-x-8">
                                <div class="h-48 overflow-visible w-1/2">
                                    <img class="rounded-3xl shadow-lg"
                                        src="https://www.themoviedb.org/t/p/w600_and_h900_bestv2/1LRLLWGvs5sZdTzuMqLEahb88Pc.jpg"
                                        alt="">
                                </div>
                                <div class="flex flex-col w-1/2 space-y-4">
                                    <div class="flex justify-between items-start">
                                        <h2 class="text-2xl font-bold">{{ $combo->nome }}</h2>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-400">Series</div>
                                        <div class="text-lg text-gray-800">2019</div>
                                    </div>
                                    <p class=" text-gray-400 max-h-40 overflow-y-hidden">{{ $combo->descricao }}</p>
                                    <div class="flex text-2xl font-bold text-a">
                                        R${{ number_format($combo->valor_total, 2, ',') }}</div>
                                </div>

                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        @endif
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
                    <p class="text-lg font-semibold tracking-wider text-green-500">R${{ $produtoDetalhe->preco ?? 0 }}</p>

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
                            <button wire:click="removerItem({{ $produto->id ?? '' }}, {{ '-1' }})"
                                class="p-1 rounded-full hover:bg-gray-100">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M19 11H5V13H19V11Z"></path>
                                </svg>
                            </button>


                            @foreach ($carrinho as $index => $item)
                                @if ($produto->id == $item['codigo'])
                                    <input class="w-4 mx-2 text-center" type="text"
                                        value="{{ $carrinho[$index]['quantidade'] }}">
                                @else
                                    <input class="w-4 mx-2 text-center" type="text" value="1">
                                @endif
                            @endforeach


                            <button
                                wire:click="adicionarItem({{ $produto->id ?? '' }}, '{{ $produto->nome ?? '' }}', '{{ $produto->descricao ?? '' }}', 1 ,  '{{ $produto->pivot->valor_promocao ?? '' }}')"
                                class="p-1 rounded-full hover:bg-gray-100">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path d="M11 11V5H13V11H19V13H13V19H11V13H5V11H11Z"></path>
                                </svg>
                            </button>
                        </div>

                        <button
                            x-on:click="
                        window.livewire.emit(
                            'Ecommerce.Ecommerce.CarrinhoBotao',
                            'adicionarItem',
                            {{ $produto->id ?? '' }},
                            '{{ $produto->nome ?? '' }}',
                            '{{ $produto->descricao ?? '' }}',
                            '1',
                            '{{ $produto->preco ?? '' }}'
                        );
                    "
                            class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white">
                            <span>Adicionar</span>

                            {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path
                                    d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                            </svg> --}}
                        </button>
                    </div>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>
</div>
