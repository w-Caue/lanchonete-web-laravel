<div>
    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
        <div class="flex items-center mb-4 sm:mb-0">
            <form class="sm:pr-3" action="#" method="GET">
                <label for="products-search" class="sr-only">Pesquisa</label>
                <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                    <input type="text" name="email" id="products-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Pesquisar">
                </div>
            </form>
            <div class="flex flex-col flex-wrap w-60 h-14 sm:justify-end">
                <div class="flex items-center gap-1 mx-1">
                    <span class="w-3 h-3 bg-gray-400 rounded-full"></span>
                    <p class="text-xs text-gray-400 font-semibold">Pedido em Aberto</p>
                </div>
                <div class="flex items-center gap-1 mx-1">
                    <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                    <p class="text-xs text-green-500 font-semibold">Pedido Finalizado</p>
                </div>
                <div class="flex items-center gap-1 mx-1">
                    <span class="w-3 h-3 bg-purple-500 rounded-full"></span>
                    <p class="text-xs text-purple-500 font-semibold">Pedido em Entrega</p>
                </div>
                <div class="flex items-center gap-1 mx-1">
                    <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                    <p class="text-xs text-yellow-500 font-semibold">Pedido Concluido</p>
                </div>
                <div class="flex items-center gap-1 mx-1">
                    <span class="w-3 h-3 bg-sky-500 rounded-full"></span>
                    <p class="text-xs text-sky-500 font-semibold">Pedido Ecommerce</p>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full mt-2 overflow-hidden rounded-lg shadow-xs hidden sm:block">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr
                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-2 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('id')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                @include('includes.icon-filter', ['field' => 'id'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Cliente')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cliente</button>
                                @include('includes.icon-filter', ['field' => 'cliente'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Descricao')">
                                <button
                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Descrição</button>
                                @include('includes.icon-filter', ['field' => 'descricao'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Descricao')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Forma
                                    Pagamento</button>
                                @include('includes.icon-filter', ['field' => 'descricao'])
                            </div>
                        </th>
                        <th class="px-4 py-3">Total dos Itens</th>
                        <th class="px-4 py-3">Total do Pedido</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pedidos as $pedido)
                        <tr wire:key="{{ $pedido->id }}"
                            class="font-semibold {{ $pedido->status == 'Finalizado' ? 'text-green-500' : 'text-gray-400' }} {{ $pedido->status == 'Ecommerce' ? 'text-sky-500' : 'text-gray-400' }}">
                            <td class="px-4 py-3 text-sm">
                                #{{ $pedido->id }}
                            </td>
                            <td class="px-2 py-3">
                                <p class="">{{ $pedido->pessoa->nome }}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pedido->descricao }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pedido->formaPagamento->nome }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ number_format($pedido->total_itens, 2, ',', '.') }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ number_format($pedido->total_pedido, 2, ',', '.') }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">

                                    @if ($pedido->status == 'Ecommerce')
                                        <a href="{{ route('admin.pedido.show', ['codigo' => $pedido->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 rounded-lg hover:scale-105 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor" class="w-6 h-6">
                                                <path
                                                    d="M8.25 10.875a2.625 2.625 0 1 1 5.25 0 2.625 2.625 0 0 1-5.25 0Z" />
                                                <path fill-rule="evenodd"
                                                    d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.125 4.5a4.125 4.125 0 1 0 2.338 7.524l2.007 2.006a.75.75 0 1 0 1.06-1.06l-2.006-2.007a4.125 4.125 0 0 0-3.399-6.463Z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @else
                                        <a href="{{ route('admin.pedido.show', ['codigo' => $pedido->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 rounded-lg hover:scale-105 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a>

                                        <button wire:click="remover({{ $pedido->id }})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  rounded-lg hover:scale-95 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>
