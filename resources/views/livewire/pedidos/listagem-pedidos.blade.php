<div>

    <div class="w-full bg-gray-50 rounded-lg dark:bg-gray-800">
        <div x-data="{ open: false }" class="flex justify-between mx-3 py-3">
            <div class="flex items-center mb-4 sm:mb-0">
                <div class="relative w-60">
                    <input wire:model.live="search"
                        class="block p-3 w-full shadow-md font-semibold border rounded-lg text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                        placeholder="Pesquisa pelo o Nome">

                    <button class="absolute top-0 right-0 p-3 text-sm text-gray-500 font-medium rounded transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <button x-ref="button" x-on:mouseover="open = true" x-on:mouseout="open = false"
                    class="text-gray-600 dark:text-gray-500 dark:hover:text-gray-200">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M3 3H12.382C12.7607 3 13.107 3.214 13.2764 3.55279L14 5H20C20.5523 5 21 5.44772 21 6V17C21 17.5523 20.5523 18 20 18H13.618C13.2393 18 12.893 17.786 12.7236 17.4472L12 16H5V22H3V3Z">
                        </path>
                    </svg>
                </button>

                <div class="absolute right-2 top-8 w-44 bg-white border rounded-md p-4 dark:bg-gray-800 dark:border-gray-500"
                    x-show="open" x-anchor="$refs.button" x-transition x-transition.duration.300ms>
                    <div class="flex items-center gap-1">
                        <div class="h-3 w-3 rounded-full bg-gray-400">
                        </div>

                        <span class="text-xs font-semibold tracking-widest uppercase text-gray-400">Aberto</span>
                    </div>
                    <div class="flex items-center gap-1 mt-4">
                        <div class="h-3 w-3 rounded-full bg-green-500">
                        </div>

                        <span class="text-xs font-semibold tracking-widest uppercase text-green-500">Finalizado</span>
                    </div>
                    <div class="flex items-center gap-1 mt-4">
                        <div class="h-3 w-3 rounded-full bg-blue-500">
                        </div>

                        <span class="text-xs font-semibold tracking-widest uppercase text-blue-500">Concluido</span>
                    </div>
                    <div class="flex items-center gap-1 mt-4">
                        <div class="h-3 w-3 rounded-full bg-purple-500">
                        </div>

                        <span class="text-xs font-semibold tracking-widest uppercase text-purple-500">Entrega</span>
                    </div>
                </div>

                <x-button.primary x-data x-on:click="$dispatch('open-modal', { name : 'pedido'})"
                    class="flex items-center gap-1">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z">
                        </path>
                    </svg>

                    <span>Novo pedido</span>
                </x-button.primary>
            </div>

        </div>

        <div class="border my-4 mx-32 dark:border-gray-700"></div>

        <div class="w-full mt-2 overflow-hidden rounded-lg shadow-xs hidden sm:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-300 dark:bg-gray-800">
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('id')">
                                    <button class="leading-4 font-medium tracking-wider uppercase">Cod</button>
                                    @include('includes.icon-filter', ['field' => 'id'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Cliente')">
                                    <button class="leading-4 font-medium tracking-wider uppercase">Cliente</button>
                                    @include('includes.icon-filter', ['field' => 'cliente'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Descricao')">
                                    <button class="leading-4 font-medium tracking-wider uppercase">Observação</button>
                                    @include('includes.icon-filter', ['field' => 'descricao'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Descricao')">
                                    <button class="leading-4 font-medium tracking-wider uppercase">Forma
                                        Pagamento</button>
                                    @include('includes.icon-filter', ['field' => 'descricao'])
                                </div>
                            </th>
                            <th class="py-3 font-medium text-center">Status</th>
                            <th class="py-3 font-medium text-center">Total do Pedido</th>
                            <th class="py-3 font-medium text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($pedidos as $pedido)
                            <tr wire:key="{{ $pedido->id }}"
                                class="font-semibold text-sm uppercase {{ $pedido->status == 'Aberto' ? 'text-gray-400' : '' }}">
                                <td class="py-1 text-center">
                                    #{{ $pedido->id }}
                                </td>
                                <td class="py-1 text-center">
                                    <p class="">{{ $pedido->cliente_nome }}</p>
                                </td>
                                <td class="py-1 text-center text-xs">
                                    {{ $pedido->observacao }}
                                </td>
                                <td class="py-1 text-center text-xs">
                                    {{ $pedido->pagamento->nome }}
                                </td>
                                <td class="py-1 text-center  text-xs">
                                    {{ $pedido->status }}
                                </td>
                                <td class="py-1 text-center">
                                    {{ number_format($pedido->total_pedido, 2, ',', '.') }}
                                </td>

                                <td class="py-1 text-center">
                                    <div class="flex justify-center items-center space-x-2">

                                        @if ($pedido->status == 'Ecommerce')
                                            <a href="{{ route('admin.pedido.show', ['codigo' => $pedido->id]) }}"
                                                class="flex items-center justify-between px-2 py-2 font-medium leading-5 rounded-lg hover:scale-105 focus:outline-none focus:shadow-outline-gray"
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
                                                class="flex items-center justify-between px-2 py-2 font-medium leading-5 rounded-lg hover:scale-105 focus:outline-none focus:shadow-outline-gray"
                                                aria-label="Edit">
                                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="currentColor">
                                                    <path
                                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                                    </path>
                                                </svg>
                                            </a>

                                            <button wire:click="remover({{ $pedido->id }})"
                                                class="flex items-center justify-between px-2 py-2 font-medium leading-5  rounded-lg hover:scale-95 focus:outline-none focus:shadow-outline-gray"
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
                        @empty
                            <div class="absolute left-[50%] mt-16 flex justify-center">
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

        <div class="border my-4 mx-32 dark:border-gray-700"></div>

        <div class="mx-4 my-7 py-3">
            {{-- {{ $pessoas }} --}}
        </div>

    </div>

</div>
