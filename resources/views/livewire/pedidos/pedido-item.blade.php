<div>

    <div class="flex flex-col items-start gap-5 my-10 mx-1 md:flex-row">

        <div class="w-full md:w-2/3">
            <div class=" text-sm font-semibold bg-gray-800 rounded w-full px-5 py-5 shadow-md">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-500 mb-4">Informações</h1>

                <div class="my-1 flex justify-between">
                    <h1 class="text-gray-400">#{{ $pedido->id }}</h1>

                    <label class="flex items-center gap-1">
                        <p class="text-xs font-semibold uppercase text-gray-500">data:</p>
                        <h1 class="text-gray-400">{{ date('d/m/Y', strtotime($pedido->created_at)) }}</h1>
                    </label>
                </div>

                <label x-data="{ client: false }" class="relative mt-2">
                    <p class="text-xs font-semibold uppercase text-gray-500">Cliente:</p>

                    <div class="relative w-56">
                        <input disabled value="{{ $pedido->pessoa->name }}"
                            class="p-3 w-full font-semibold rounded-md uppercase text-xs tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-700 dark:text-gray-100">

                        <a href="{{ route('admin.pessoal.show', ['codigo' => $pedido->pessoa->id]) }}"
                            x-on:mouseover="client = true" x-on:mouseleave="client = false"
                            class="absolute top-0 right-0 p-3 text-gray-100 transition-all hover:text-blue-500">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                </path>
                            </svg>
                        </a>

                    </div>
                    <div x-cloak x-show="client === true"
                        class="absolute z-10 top-0 p-1 ml-16 text-xs tracking-wider uppercase font-semibold text-gray-400 bg-gray-200 rounded dark:bg-gray-900">
                        <p>Cadastro do Cliente</p>
                    </div>

                </label>

                <div class="grid grid-cols-2 mt-5">
                    <div x-data="{ pagamento: false }" class="relative text-gray-500">
                        <p class="text-xs font-semibold uppercase">forma de pagamento:</p>

                        <div class="flex items-center gap-1">
                            <label
                                class="w-56 text-gray-400 font-semibold text-md text-center p-1 mt-1 rounded bg-gray-700">
                                <p>{{ $pedido->pagamento->nome }}</p>
                            </label>
                            <button x-data x-on:click.prevent="$dispatch('open-modal-small', { name : 'pagamento' })"
                                x-on:mouseover="pagamento = true" x-on:mouseleave="pagamento = false">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 4C9.25144 4 6.82508 5.38626 5.38443 7.5H8V9.5H2V3.5H4V5.99936C5.82381 3.57166 8.72764 2 12 2C17.5228 2 22 6.47715 22 12H20C20 7.58172 16.4183 4 12 4ZM4 12C4 16.4183 7.58172 20 12 20C14.7486 20 17.1749 18.6137 18.6156 16.5H16V14.5H22V20.5H20V18.0006C18.1762 20.4283 15.2724 22 12 22C6.47715 22 2 17.5228 2 12H4Z">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div x-cloak x-show="pagamento === true"
                            class="absolute z-10 top-0 p-1 ml-36 text-xs tracking-wider uppercase font-semibold text-gray-400 bg-gray-200 rounded dark:bg-gray-900">
                            <p>Mudar Pagamento</p>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase text-gray-500">Observação:</p>
                        <textarea disabled placeholder="insira a observação aqui" value=""
                            class="w-full p-3 pl-2 uppercase text-xs text-gray-400 font-semibold rounded shadow-sm bg-white dark:bg-gray-700"
                            id="" rows="2">{{ $pedido->observacao }}</textarea>
                    </div>

                </div>
            </div>

            <div class=" text-sm font-semibold bg-gray-800 rounded w-full px-5 py-5 shadow-md mt-10">

                <div class="flex justify-between items-start">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-500 mb-4">Itens</h1>

                    @if ($pedido->status == 'Aberto')
                        <button x-data x-on:click.prevent="$dispatch('open-modal', { name : 'produtos' })"
                            class="font-semibold rounded text-xs uppercase p-2 text-white bg-blue-500 hover:bg-indigo-500 transition-all hover:scale-95">
                            Adicionar Item
                        </button>
                    @endif

                </div>
                <div>

                    <div class="w-full overflow-hidden mt-5 rounded-lg shadow-xs hidden sm:block">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-300 dark:bg-gray-800">
                                        <th class="py-2">
                                            <div class="flex justify-center items-center cursor-pointer"
                                                wire:click="sortFilter('id')">
                                                <button
                                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                                @include('includes.icon-filter', ['field' => 'id'])
                                            </div>
                                        </th>

                                        <th class="py-2">
                                            <div class="flex justify-center items-center cursor-pointer"
                                                wire:click="sortFilter('Item')">
                                                <button
                                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Item</button>
                                                @include('includes.icon-filter', ['field' => 'Item'])
                                            </div>
                                        </th>

                                        <th class="py-2">
                                            <div class="flex justify-center items-center cursor-pointer"
                                                wire:click="sortFilter('Promocao')">
                                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                    Preço
                                                </button>
                                                @include('includes.icon-filter', ['field' => 'promocao'])
                                            </div>
                                        </th>

                                        <th class="py-2">
                                            <div class="flex justify-center items-center cursor-pointer"
                                                wire:click="sortFilter('Quantidade')">
                                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                    Quantidade
                                                </button>
                                                @include('includes.icon-filter', ['field' => 'quantidade'])
                                            </div>
                                        </th>

                                        <th class="py-2">
                                            <div class="flex justify-center items-center cursor-pointer"
                                                wire:click="sortFilter('Quantidade')">
                                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">
                                                    Total
                                                </button>
                                                @include('includes.icon-filter', ['field' => 'quantidade'])
                                            </div>
                                        </th>

                                        <th class="py-2">Ações</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @forelse ($pedido->itens as $item)
                                        <tr wire:key="{{ $item->id }}" class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->id }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-xs">
                                                    <div>
                                                        <p class="font-semibold uppercase">{{ $item->nome }}</p>
                                                        <p class="text-gray-600 dark:text-gray-400">
                                                            {{ $item->descricao }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                           
                                            <td class="px-4 py-3 text-xs">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                    R${{ number_format($item->preco, 2, ',', '.') }}
                                                </span>
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                <div class="flex items-center gap-1">
                                                    @if ($pedido->status == 'Aberto')
                                                        <button wire:click="removerProduto({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M5 12h14" />
                                                            </svg>
                                                        </button>
                                                    @endif

                                                    <h1 class="bg-gray-700 rounded text-blue-500 px-3">
                                                        {{ $item->pivot->quantidade }}
                                                    </h1>

                                                    @if ($pedido->status == 'Aberto')
                                                        <button class=""
                                                            wire:click="adicionarProduto({{ $item->id }})">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-5 h-5">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 4.5v15m7.5-7.5h-15" />
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>
                                            </td>

                                            <td class="px-4 py-3 text-sm text-center">
                                                R${{ number_format($item->pivot->total, 2, ',', '.') }}
                                            </td>
                                            
                                            <td x-data="{ excluir: false }" class="px-4 py-3">
                                                <div class="flex items-center space-x-2 text-sm">
                                                    @if ($pedido->status == 'Aberto')
                                                        <button x-on:mouseover="excluir = true"
                                                            x-on:mouseleave="excluir = false"
                                                            wire:click="excluirProduto({{ $item->id }})"
                                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-95 dark:hover:text-blue-600
                                                     dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                            aria-label="Delete">
                                                            <svg class="w-5 h-5" aria-hidden="true"
                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd"
                                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    @endif
                                                </div>

                                                <div x-cloak x-show="excluir === true"
                                                    class="absolute z-10 top-8 p-1 mr-10 text-xs tracking-wider uppercase font-semibold text-gray-400 bg-gray-200 rounded dark:bg-gray-900">
                                                    <p>Excluir</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="absolute left-[31%] mt-16 flex justify-center">
                                            <h1
                                                class="text-sm font-semibold text-center tracking-widest uppercase bg-red-200 rounded w-44 p-1 dark:text-red-600">
                                                Sem registros
                                            </h1>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="w-full md:w-1/3">
            <div class="h-auto px-5 py-5 rounded-md shadow-md bg-gray-800">
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-500 mb-4">Totais</h1>
                <div
                    class="flex justify-between py-4 text-xs tracking-widest font-semibold uppercase text-gray-400 border-b border-gray-700">
                    <span>total de produtos: </span>
                    <span>{{ sizeof($pedido->itens) }}</span>
                </div>

                <div
                    class="flex justify-between py-4 text-xs tracking-widest font-semibold uppercase text-gray-400 border-b border-gray-700">
                    <span>total em produtos: </span>
                    <span> R${{ number_format($pedido->total_itens, 2, ',') }}</span>
                </div>

                <div class="flex justify-between py-4 text-xs tracking-widest font-semibold uppercase text-gray-400">
                    <span>total do pedido: </span>
                    <span> R${{ number_format($pedido->total_pedido, 2, ',') }}</span>
                </div>

                @if ($pedido->status == 'Aberto')
                    <button wire:click="finalizarPedido()"
                        class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-white uppercase rounded bg-purple-700">
                        Finalizar Pedido
                    </button>
                @endif
            </div>

            @if ($pedido->ecommerce == 'S')
                <div class="mt-10 px-5 py-5 rounded-md shadow-md bg-gray-800">
                    <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-500 mb-4">Endereço de Entrega
                    </h1>
                    <div class="flex flex-col gap-2 font-semibold text-gray-400">
                        <h1 class="text-lg">{{ $pedido->endereco->complemento }}
                            {{ $pedido->endereco->numero }}</h1>

                        <span class="text-sm">{{ $pedido->endereco->endereco }} -
                            {{ $pedido->endereco->bairro }}</span>
                        <span class="text-sm">CEP: {{ $pedido->endereco->cep }}</span>
                    </div>

                </div>
            @endif

        </div>

    </div>

    {{-- Pesquisar Produto --}}
    <x-modal.modal-large name="produtos" title="Produtos">
        @slot('body')
            <div>
                <div class="relative w-72">
                    <input wire:modal.live="searchProduct"
                        class="block p-3 w-full font-semibold rounded-md uppercase text-xs tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-700 dark:text-gray-300"
                        placeholder="Pesquise aqui">

                    <button type="button" wire:click="produtos()"
                        class="absolute top-0 right-0 p-3 text-sm text-purple-600 font-medium rounded transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>

                @if ($produtos)
                    <div class="flex flex-wrap gap-4">
                        @foreach ($produtos as $produto)
                            <div wire:key="{{ $produto->id }}" class="grid grid-cols-2 my-4 bg-gray-700 rounded p-2">
                                <div class="m-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                                        viewBox="0 0 24 24" class="h-32">
                                        <path
                                            d="m23.854,23.146l-1.838-1.838c.636-.796.984-1.785.984-2.809v-9c0-2.481-2.019-4.5-4.5-4.5h-.782l-1.983-2.908c-.466-.684-1.238-1.092-2.065-1.092h-3.34c-.827,0-1.6.408-2.065,1.092l-1.983,2.908h-.575L.854.146C.658-.049.342-.049.146.146S-.049.658.146.854l4.997,4.997s.003.003.005.005l17.997,17.997c.098.098.226.146.354.146s.256-.049.354-.146c.195-.195.195-.512,0-.707Zm-8.015-8.015l-4.97-4.97c.364-.107.743-.161,1.132-.161,2.206,0,4,1.794,4,4,0,.389-.054.768-.161,1.132Zm6.161-5.632v9c0,.759-.246,1.492-.698,2.095l-4.682-4.682c.252-.605.38-1.247.38-1.913,0-2.757-2.243-5-5-5-.666,0-1.309.128-1.913.38l-3.38-3.38h11.793c1.93,0,3.5,1.57,3.5,3.5ZM9.091,2.654c.279-.409.743-.654,1.239-.654h3.34c.496,0,.96.245,1.239.654l1.599,2.346H7.492l1.599-2.346Zm9.909,19.846c0,.276-.224.5-.5.5H5.5c-2.481,0-4.5-2.019-4.5-4.5v-9c0-1.097.399-2.154,1.125-2.977.183-.206.497-.227.706-.044.207.183.227.499.044.706-.564.64-.875,1.461-.875,2.314v9c0,1.93,1.57,3.5,3.5,3.5h13c.276,0,.5.224.5.5Zm-10.772-9.833c-.151.426-.228.874-.228,1.333,0,2.206,1.794,4,4,4,.459,0,.907-.076,1.333-.228.261-.094.545.044.639.305.092.261-.045.546-.305.639-.533.188-1.094.284-1.667.284-2.757,0-5-2.243-5-5,0-.573.096-1.134.284-1.667.093-.261.377-.396.639-.305.26.093.396.378.305.639Z" />
                                    </svg>
                                </div>
                                <div class="flex flex-col gap-1 font-semibold dark:text-white">


                                    <span class="text-blue-500">#{{ $produto->id }}</span>

                                    <div class="flex flex-wrap justify-between">
                                        <p class="text-sm uppercase">{{ $produto->nome }}</p>
                                    </div>

                                    <p class="flex flex-wrap text-sm text-gray-600 dark:text-gray-400">
                                        {{ $produto->descricao }}
                                    </p>

                                    <div class="flex justify-between items-center mt-1 text-sm">
                                        @if ($produto->preco > 0)
                                            <span class="leading-tight text-green-700 dark:text-gray-300">
                                                R${{ number_format($produto->preco, 2, ',') }}
                                            </span>
                                        @else
                                            <span class="leading-tight text-red-700">
                                                {{ $produto->preco }}
                                            </span>
                                        @endif
                                    </div>

                                    <button wire:click="adicionarProduto({{ $produto->id }})"
                                        class="w-36 mt-2 py-1 font-semibold text-white rounded bg-blue-500 transition-all hover:scale-95">
                                        Adicionar
                                    </button>
                                </div>
                            </div>
                        @endforeach

                        <div class="mx-7 mt-2">
                            {{ $produtos->links('layouts.paginate') }}
                        </div>

                    </div>
                @endif

            </div>
        @endslot
    </x-modal.modal-large>

    {{-- Formas de Pagamento --}}
    <x-modal.modal-small name="pagamento" title="Formas de Pagamento">
        @slot('body')
            <div>
                <h1 class="text-sm tracking-widest font-semibold uppercase text-gray-400 mb-2">Selecione a Forma de
                    Pagamento:</h1>

                <div class="grid grid-cols-2 gap-4">
                    @foreach ($pagamentos as $pagamento)
                        <div>
                            <input wire:model="pagamento" wire:click="formaPagamento({{ $pagamento->id }})"
                                type="radio" id="{{ $pagamento->id }}" name="hosting" value="{{ $pagamento->nome }}"
                                class="hidden peer" required />
                            <label for="{{ $pagamento->id }}"
                                class="inline-flex items-center justify-between w-full p-2 text-gray-300 bg-gray-700 border border-gray-600 rounded-lg cursor-pointer peer-checked:border-purple-600 peer-checked:text-purple-600 peer-checked:bg-gray-800 hover:text-white hover:bg-gray-800">

                                <div class="flex gap-2 items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-9 h-9">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                    </svg>


                                    <h1 class="text-md tracking-widest font-semibold uppercase">{{ $pagamento->nome }}
                                    </h1>
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endslot
    </x-modal.modal-small>

</div>
