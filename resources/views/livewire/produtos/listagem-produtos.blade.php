<div>

    <div class="w-full bg-gray-50 rounded-lg dark:bg-gray-800">
        <div class="flex justify-between mx-3 py-3">
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

            {{-- <div class="">
                <button x-data x-on:click="$dispatch('open-modal')"
                    class="text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 transition-all hover:scale-105"
                    type="button">
                    Novo Cadastro
                </button>
            </div> --}}
            <div>
                <x-button.primary x-data x-on:click="$dispatch('open-modal')" class="flex items-center gap-1">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM11 11H7V13H11V17H13V13H17V11H13V7H11V11Z">
                        </path>
                    </svg>

                    <span>Novo</span>
                </x-button.primary>
            </div>

        </div>

        <div class="border my-4 mx-32 dark:border-gray-700"></div>

        <div class="w-full mt-2 overflow-hidden rounded-lg shadow-xs hidden sm:block">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-300 dark:bg-gray-800">
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('id')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Cod</button>
                                    @include('includes.icon-filter', ['field' => 'id'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Nome')">
                                    <button class="text-xs font-medium leading-4 tracking-wider uppercase">Nome</button>
                                    @include('includes.icon-filter', ['field' => 'nome'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Decricao')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Decrição</button>
                                    @include('includes.icon-filter', ['field' => 'decricao'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Categoria')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Categoria</button>
                                    @include('includes.icon-filter', ['field' => 'categoria'])
                                </div>
                            </th>
                            <th class="py-3">
                                <div class="flex justify-center items-center cursor-pointer"
                                    wire:click="sortFilter('Preco')">
                                    <button
                                        class="text-xs font-medium leading-4 tracking-wider uppercase">Preço</button>
                                    @include('includes.icon-filter', ['field' => 'preco'])
                                </div>
                            </th>
                            <th class="py-3 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @forelse ($produtos as $produto)
                            <tr wire:key="{{ $produto->id }}"
                                class="font-semibold {{ $produto->encarte > 0 ? 'text-purple-500' : 'text-gray-700 dark:text-gray-400' }}">
                                <td class="py-3 text-center text-sm text-blue-400">
                                    {{ $produto->id }}
                                </td>
                                <td class="py-3 text-center uppercase text-sm text-gray-200">
                                    {{ $produto->nome }}
                                </td>
                                <td class="py-3 text-center uppercase text-xs">
                                    {{ $produto->descricao }}
                                </td>
                                <td class="py-3 text-center text-xs uppercase">
                                    {{ $produto->categoria->nome ?? '(vazio)' }}
                                </td>
                                <td class="py-3 text-center text-xs">
                                    <span
                                        class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        R${{ number_format($produto->preco, 2, ',', '.') }}
                                    </span>
                                </td>
                                <td class="py-3">
                                    <div class="flex justify-center items-center space-x-2 text-sm">
                                        <a href="{{ route('admin.produto.show', ['codigo' => $produto->id]) }}"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-105 dark:hover:text-blue-600 dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                fill="currentColor">
                                                <path
                                                    d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                                </path>
                                            </svg>
                                        </a>

                                        {{-- <button wire:click="remover({{ $produto->id }})"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-blue-600 rounded-lg hover:scale-95 dark:hover:text-blue-600
                                             dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button> --}}
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


    {{-- <div x-data="" x-init="Sortable.create($el, {
        animation: 150,
        handle: '.handler'
        })" class="flex gap-4 m-4">
        @foreach ($categorias as $categoria)
            <div class="bg-gray-600 w-56 rounded p-2">
                <div class="flex justify-between text-gray-50">
                    <h1 class="font-semibold">{{ $categoria->nome }}</h1>

                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 handler">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                        </svg>
                    </button>
                </div>

                <div categoria-id="{{ $categoria->id }}" class="cursor-pointer" x-data="" x-init="Sortable.create($el, {
                    animation: 150,
                    group: 'group',
                    onSort({ to }){
                        const categoriaId = to.getAttribute('categoria-id');
                        const produtoId = Array.from(to.children).map(i => i.getAttribute('produto-id'));
                        
                        @this.reodernaProdutos({ categoriaId, produtoId });
                    }
                })">
                    @foreach ($produtos as $produto)
                        @if ($produto->categoria_id == $categoria->id)
                            <div produto-id="{{ $produto->id }}" class="bg-white rounded my-1 p-1">
                                <h1 class="font-semibold text-gray-700">{{ $produto->nome }}</h1>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div> --}}
</div>
