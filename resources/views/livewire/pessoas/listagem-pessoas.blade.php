<div>

    <div class="w-full bg-gray-50 rounded-lg dark:bg-gray-800">
        <div class="flex justify-between mx-3 py-3">
            <div class="relative w-60">
                <input wire:model.live="search"
                    class="block p-3 w-full shadow-md font-semibold border rounded-lg text-sm tracking-widest focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                    placeholder="Pesquisa pelo o {{ str_replace('.', '>', $sortFilter) }}">

                <button class="absolute top-0 right-0 p-3 text-sm text-gray-500 font-medium rounded transition-all">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </div>

            <div class="flex justify-center items-center gap-5">
                <button x-data x-on:click="$dispatch('open-modal')"
                    class="flex items-center gap-1 text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded text-sm uppercase p-2 transition-all hover:scale-105"
                    type="button">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z">
                        </path>
                    </svg>

                    <span>Novo</span>
                </button>

                <button
                    class="text-white bg-purple-500 hover:bg-purple-600 font-medium rounded text-md p-2 transition-all hover:scale-105">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M10 18H14V16H10V18ZM3 6V8H21V6H3ZM6 13H18V11H6V13Z"></path>
                    </svg>
                </button>
            </div>

        </div>

        <div class="border my-4 mx-32 dark:border-gray-700"></div>

        <div class="w-full overflow-hidden rounded-lg shadow-xs hidden sm:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-center text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">
                                <div class="flex items-center cursor-pointer" wire:click="sortBy('id')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                    @include('includes.icon-filter', ['field' => 'id'])
                                </div>
                            </th>
                            <th class="px-4 py-3 text-center">
                                <div class="flex items-center cursor-pointer" wire:click="sortBy('name')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                    @include('includes.icon-filter', ['field' => 'name'])
                                </div>
                            </th>
                            <th class="px-4 py-3 flex justify-center">
                                <div class="flex items-center cursor-pointer" wire:click="sortBy('phone')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Telefone</button>
                                    @include('includes.icon-filter', ['field' => 'phone'])
                                </div>
                            </th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Data Cadastro</th>
                            <th class="px-4 py-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($pessoas as $pessoa)
                            <tr wire:key="{{ $pessoa->id }}" class="text-gray-700 font-semibold dark:text-gray-400">
                                <td class="px-4 py-3 text-sm">
                                    {{ $pessoa->id }}
                                </td>

                                <td class="px-1 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <div class="relative hidden mx-2 md:block">
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="none" viewBox="0 0 20 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="1.5"
                                                    d="M10 19a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 11 14H9a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 10 19Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="">{{ $pessoa->name }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                                {{ $pessoa->type }}
                                            </p>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-4 py-3 text-sm text-center">
                                    {{ $pessoa->phone }}
                                </td>
                                <td class="px-4 py-3 text-xs tracking-wider text-center">
                                    @if ($pessoa->status == 'Ativo')
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-blue-100 dark:text-blue-500">
                                            {{ $pessoa->status }}
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-red-700 bg-green-100 rounded-full dark:bg-red-200 dark:text-red-500">
                                            {{ $pessoa->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm text-center">
                                    {{ date('d/m/Y', strtotime($pessoa->created_at)) }}
                                </td>
                                <td class="px-4 py-3 flex justify-center">
                                    <div class="flex items-center space-x-2 text-sm">
                                        {{-- <a class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-105 dark:hover:text-purple-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </a> --}}

                                        <a href="{{ route('admin.pessoal.show', ['codigo' => $pessoa->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg hover:scale-95 dark:hover:text-purple-600
                                             dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                                </path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <div class="flex justify-center">
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
            {{ $pessoas }}
        </div>

    </div>
</div>
