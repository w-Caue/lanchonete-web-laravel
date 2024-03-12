<div>
    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
        <div class="flex items-center mb-4 sm:mb-0">
            <form class="sm:pr-3" action="#" method="GET">
                <label for="products-search" class="sr-only">Pesquisa</label>
                <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                    <input type="text" name="email" id="products-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="Pesquisa">
                </div>
            </form>
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
                                <button
                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
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
                                <button
                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Valor do Combo</button>
                                @include('includes.icon-filter', ['field' => 'cliente'])
                            </div>
                        </th>

                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Ativo')">
                                <button
                                    class="text-xs font-medium leading-4 tracking-wider uppercase">Ativo</button>
                                @include('includes.icon-filter', ['field' => 'ativo'])
                            </div>
                        </th>
                        
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($combos as $combo)
                        <tr wire:key="{{ $combo->id }}" class="text-gray-700 font-semibold dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                #{{ $combo->id }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $combo->nome }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $combo->descricao }}
                            </td>
                            
                            <td class="px-4 py-3 text-sm">
                                {{ $combo->valor_total }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $combo->ativo }}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <a href="{{ route('admin.produto.combos.show', ['codigo' => $combo->id]) }}" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-105 dark:hover:text-blue-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
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
