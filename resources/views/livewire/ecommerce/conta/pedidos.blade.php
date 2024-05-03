<div>
    <div class="flex-1 p-5 bg-white rounded-md">

        <div class="mb-4 text-gray-700 tracking-wider">
            <h4 class="text-2xl font-bold ">
                Meus Pedidos
            </h4>
            <span class="text-sm">Confira os detalhes dos seus pedidos.</span>
        </div>


        <div class="py-5">
            <div class="flex justify-between px-2 text-lg font-semibold tracking-widest text-gray-800 my-1">
                <h1>Pedido</h1>
                <h1>Status</h1>
                <h1>Total</h1>
            </div>

            @foreach ($pedidos as $pedido)
                <div x-data="{ pedido: false }" wire:key="{{ $pedido->id }}"
                    class="flex flex-col px-2 py-3 my-2 text-gray-700 tracking-widest border rounded-xl p-1">
                    <div class="flex justify-between items-center w-full">
                        <div>
                            <h1 class="text-sm font-bold">{{ $pedido->id }}</h1>
                            <span class="text-xs">{{ date('d/m/Y', strtotime($pedido->created_at)) }}</span>
                        </div>

                        <span class="font-semibold border rounded-full p-2 ml-10">Pedido em {{ $pedido->status }}</span>

                        <div class="flex gap-1 font-semibold">
                            <h1>R${{ number_format($pedido->total_pedido, '2', ',') }}</h1>

                            <button x-on:click="pedido = !pedido">
                                <svg class="w-6 h-6 transition-all duration-300 transform"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    x-bind:class="pedido ? 'rotate-180' : '-rotate-50'" fill="currentColor">
                                    <path
                                        d="M11.9999 13.1714L16.9497 8.22168L18.3639 9.63589L11.9999 15.9999L5.63599 9.63589L7.0502 8.22168L11.9999 13.1714Z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div x-show="pedido" class="">

                        <div class="flex justify-center w-full mt-10">
                            <ol class="items-center sm:flex">

                                <li class="relative mb-6 sm:mb-0">
                                    <div class="flex items-center">
                                        <div
                                            class="z-10 flex items-center justify-center w-7 h-7 bg-green-500 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                            
                                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <div class="hidden sm:flex w-44 bg-gray-200 h-0.5 "></div>
                                    </div>
                                    <div class="mt-3 -ml-10 text-sm">
                                        <h3 class="font-semibold text-gray-800">
                                            Pedido Realizado
                                        </h3>

                                        <p class="text-xs font-normal text-gray-500">{{ date('d/m/Y', strtotime($pedido->created_at)) }}</p>
                                    </div>
                                </li>

                                <li class="relative mb-6 sm:mb-0">
                                    <div class="flex items-center">
                                        <div
                                            class="z-10 flex items-center justify-center w-4 h-4 bg-green-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                            {{-- <svg class="w-2.5 h-2.5 text-green-800" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg> --}}
                                        </div>
                                        <div class="hidden sm:flex w-44 bg-gray-200 h-0.5"></div>
                                    </div>
                                    <div class="mt-3 -ml-5">
                                        <h3 class="text-sm font-semibold text-gray-900">
                                            Preparando
                                        </h3>

                                        <p class="text-base font-normal text-gray-500">
                                            hora
                                        </p>
                                    </div>
                                </li>
                                <li class="relative mb-6 sm:mb-0">
                                    <div class="flex items-center">
                                        <div
                                            class="z-10 flex items-center justify-center w-4 h-4 bg-green-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                            {{-- <svg class="w-2.5 h-2.5 text-green-800" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg> --}}
                                        </div>
                                        <div class="hidden sm:flex w-44 bg-gray-200 h-0.5"></div>
                                    </div>
                                    <div class="mt-3 -ml-5">
                                        <h3 class="text-sm font-semibold text-gray-900">
                                            Em Entrega
                                        </h3>
                                        <p class="text-base font-normal text-gray-500">
                                            hora
                                        </p>
                                    </div>
                                </li>

                                <li class="relative mb-6 sm:mb-0">
                                    <div class="flex items-center">
                                        <div
                                            class="z-10 flex items-center justify-center w-4 h-4 bg-green-100 rounded-full ring-0 ring-white sm:ring-8 shrink-0">
                                            {{-- <svg class="w-2.5 h-2.5 text-green-800" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                            </svg> --}}
                                        </div>
                                        {{-- <div class="hidden sm:flex w-56 bg-gray-200 h-0.5"></div> --}}
                                    </div>
                                    <div class="mt-3 sm:pe-8">
                                        <h3 class="text-sm font-semibold text-gray-900">
                                            Concluido
                                        </h3>
                                        <p class="text-base font-normal text-gray-500">
                                            hora
                                        </p>
                                    </div>
                                </li>
                            </ol>
                        </div>

                        <div class="mt-8">
                            <h1 class="text-md tracking-widest font-bold text-gray-700 mb-4">Produtos
                            </h1>

                            @foreach ($pedido->itens as $item)
                                <div class="flex justify-between items-center p-2 my-1 ">
                                    <div class="flex w-2/5">
                                        <!-- product -->
                                        <div class="w-20">
                                            <div class="relative flex justify-center h-14 overflow-hidden rounded ">
                                                {{-- @livewire('tenant.produto.foto-produto', ['codSeqProduto' => $produto['codSeq']], key($produto['codSeq'])) --}}
                                                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1"
                                                    data-name="Layer 1" viewBox="0 0 24 24">
                                                    <path
                                                        d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="flex flex-col justify-center ml-4 cursor-pointer">
                                            <span class="text-sm tracking-widest font-semibold uppercase text-gray-700">
                                                {{ $item->nome }}
                                            </span>

                                            <span class="text-sm font-medium text-gray-500 w-56">
                                                {{ $item->descricao }}
                                            </span>



                                        </div>
                                    </div>

                                    <span class="text-md font-semibold">R${{ number_format($item->preco, 2, ',') }}
                                    </span>

                                    <span class=" text-center font-semibold text-gray-600">
                                        {{ $item->pivot->quantidade }} Item
                                    </span>

                                    <span
                                        class="w-1/5 text-lg tracking-widest font-semibold uppercase text-center">R${{ number_format($item->pivot->total, 2, ',') }}</span>


                                </div>
                            @endforeach
                        </div>

                        <div class="mt-14 grid grid-cols-2 gap-4">
                            <div class="">
                                <h1 class="text-md tracking-widest font-bold text-gray-700 mb-2">Endereço de Entrega
                                </h1>

                                <div class="flex flex-col gap-2 font-semibold border rounded-md p-2 mx-1">
                                    <h1 class="text-lg text-gray-800">{{ $pedido->endereco->complemento }}
                                        {{ $pedido->endereco->numero }}</h1>

                                    <span class="text-sm">{{ $pedido->endereco->endereco }}</span>
                                    <span class="text-sm">{{ $pedido->endereco->bairro }} - </span>

                                    <span class="text-sm">CEP: {{ $pedido->endereco->cep }}</span>
                                </div>
                            </div>

                            <div class=" text-gray-500">
                                <h1 class="text-md tracking-widest font-bold text-gray-700 mb-2">Dados de Pagamento
                                </h1>

                                <div class="flex flex-col gap-2 font-semibold border rounded-md p-2 mx-1 text-sm">

                                    <div class="flex justify-between">
                                        <p>Subtotal:</p>
                                        <span
                                            class="text-gray-800">R${{ number_format($pedido->total_itens, '2', ',') }}</span>
                                    </div>

                                    <div class="flex justify-between">
                                        <p>Forma de Pagamento:</p>
                                        <span class="text-gray-800">{{ $pedido->pagamento->nome }}</span>
                                    </div>

                                    <div class="flex justify-between text-gray-800 text-lg">
                                        <p>Total:</p>
                                        <span>R${{ number_format($pedido->total_itens, '2', ',') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</div>
