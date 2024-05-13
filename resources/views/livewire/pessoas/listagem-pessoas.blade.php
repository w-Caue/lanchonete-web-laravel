<div>
    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
        <div class="flex items-center mb-4 sm:mb-0">
            <div class="relative w-60">
                <input wire:model.live="search"
                    class="block p-3 w-full shadow-md font-semibold rounded-md text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-800 dark:text-gray-400"
                    placeholder="Pesquisa pelo o Nome">

                <button
                    class="absolute top-0 right-0 p-3 text-sm text-gray-500 font-medium rounded transition-all">
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
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Nome')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                @include('includes.icon-filter', ['field' => 'nome'])
                            </div>
                        </th>
                        <th class="px-4 py-3">
                            <div class="flex items-center cursor-pointer" wire:click="sortFilter('Whatsapp')">
                                <button class="text-xs font-medium leading-4 tracking-wider uppercase">Telefone</button>
                                @include('includes.icon-filter', ['field' => 'whatsapp'])
                            </div>
                        </th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Data Cadastro</th>
                        <th class="px-4 py-3">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($pessoas as $pessoa)
                        <tr wire:key="{{ $pessoa->id }}" class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{ $pessoa->id }}
                            </td>
                            <td class="px-2 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden mx-2 md:block">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5"
                                                d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{ $pessoa->name }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{-- @if ($pessoa->tipo_cliente == 'S')
                                                Cliente
                                            @endif
                                            @if ($pessoa->tipo_funcionario == 'S')
                                                Funcionario
                                            @endif
                                            @if ($pessoa->tipo_fornecedor == 'S')
                                                Fornecedor
                                            @endif --}}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $pessoa->phone }}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @if ($pessoa->status == 'Ativo')
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        {{ $pessoa->status }}
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-700 dark:text-green-100">
                                        {{ $pessoa->status }}
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ date('d/m/Y', strtotime($pessoa->created_at)) }}
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2 text-sm">
                                    <a href="{{ route('admin.pessoal.show', ['codigo' => $pessoa->id]) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <button wire:click="remover({{ $pessoa->id }})"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-95 dark:hover:text-purple-600
                                         dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <button
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20"
                                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
