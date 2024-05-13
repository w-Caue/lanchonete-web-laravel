<div>
    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
        <div class="flex items-center mb-4 sm:mb-0">
            <div class="relative w-60">
                <input wire:model.live="search"
                    class="block p-3 w-full shadow-md font-semibold rounded-md text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-800 dark:text-gray-400"
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
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                @include('includes.icon-filter', ['field' => 'cliente'])
                            </div>
                        </th>

                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Cliente')">
                                <button
                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Descrição</button>
                                @include('includes.icon-filter', ['field' => 'cliente'])
                            </div>
                        </th>

                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Cliente')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Valor do
                                    Combo</button>
                                @include('includes.icon-filter', ['field' => 'cliente'])
                            </div>
                        </th>

                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Ativo')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Ativo</button>
                                @include('includes.icon-filter', ['field' => 'ativo'])
                            </div>
                        </th>

                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($combos as $combo)
                        <tr wire:key="{{ $combo->id }}"
                            class="text-gray-700 font-semibold text-sm dark:text-gray-400">
                            <td class="px-4 py-2">
                                #{{ $combo->id }}
                            </td>

                            <td class="px-4 py-2">
                                {{ $combo->nome }}
                            </td>

                            <td class="px-4 py-2">
                                {{ $combo->descricao }}
                            </td>

                            <td class="px-4 py-2">
                                R${{ number_format($combo->valor_total, 2, ',') }}
                            </td>

                            <td class="px-4 py-2">
                                {{ $combo->ativo }}
                            </td>

                            <td class="px-4 py-2">
                                <div class="flex items-center space-x-2 text-sm">
                                    <a href="{{ route('admin.produto.combos.show', ['codigo' => $combo->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-105 dark:hover:text-blue-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16Z" />
                                            <path fill-rule="evenodd"
                                                d="M21.707 21.707a1 1 0 0 1-1.414 0l-3.5-3.5a1 1 0 0 1 1.414-1.414l3.5 3.5a1 1 0 0 1 0 1.414Z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
