<div>
    <div class="flex flex-col w-full">

        <div class="mb-4">
            <h4 class="text-center text-lg font-medium">Pesquisa</h4>

            <div class="flex justify-center items-center gap-1">
                <input wire:model.lazy="search" type="text" name="seach"
                    class="appearance-none block w-full md:w-1/3 bg-gray-200 text-gray-700 border rounded p-3 leading-tight focus:outline-none focus:bg-white"
                    value="">
                <button class="bg-blue-500 text-white p-2 border border-blue-500 hover:border-transparent rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="flex justify-center m-5">
            <ul class="flex gap-3">
                <li>
                    <input wire:model.live="menuCategoria" type="radio" id="todos" name="hosting" value=""
                        class="hidden peer" required>
                    <label for="todos"
                        class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                        <div class="block">
                            <div class="w-full font-semibold">Todos</div>
                        </div>

                    </label>
                </li>

                @foreach ($categorias as $categoria)
                    <li>
                        <input wire:model.live="menuCategoria" type="radio" id="{{ $categoria->categoria }}"
                            name="hosting" value="{{ $categoria->id }}" class="hidden peer" required>
                        <label for="{{ $categoria->categoria }}"
                            class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                            <div class="block">
                                <div class="w-full font-semibold">{{ $categoria->categoria }}</div>
                            </div>

                        </label>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="flex justify-end gap-1 m-5 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <button wire:click='novoItem()' class="font-medium">Cadastrar</button>
        </div>

        <div class="flex justify-center flex-wrap gap-3">
            @foreach ($itens as $item)
                <div wire:click="edit({{ $item->id }})"
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 hover:bg-gray-100 cursor-pointer">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="/docs/images/blog/image-4.jpg" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $item->nome }}</h5>
                        <p class="mb-1 font-semibold text-gray-600">{{ $item->descricao }}</p>
                        <p class="mb-1 font-semibold text-gray-900">R${{ number_format($item->preco, 2, ',', '.') }}</p>
                        <p class="mb-1 font-semibold text-sky-700">{{ $item->categoria->categoria }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="m-4">
            {{ $itens->links('layouts.paginate') }}
            {{-- appends($request)-> --}}
        </div>

    </div>

    @if ($newItem)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-3/4 shadow-2xl border rounded-lg">

                <div class="bg-blue-400 rounded-t-lg mb-4 flex justify-end ">
                    <button wire:click.prevent='fecharItem()' class="text-white rounded m-2 hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-center text-xl font-semibold mb-5">
                    Cadastro
                </h1>

                <div class="flex justify-center">
                    <form wire:submit.prevent="{{ $form->itemId ? 'update()' : 'save()' }}" class="w-full max-w-2xl">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Nome
                                </label>
                                <input wire:model='form.nome'
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text">
                            </div>

                            @error('form.nome')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 md:w-3/4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                    Descrição
                                </label>
                                <input wire:model='form.descricao'
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-password" type="text">
                            </div>

                            @error('form.descricao')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-32 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Preço
                                </label>
                                <input wire:model='form.preco'
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text">
                            </div>

                            @error('form.preco')
                                <span class="error">{{ $message }}</span>
                            @enderror
                            <div class="w-full md:w-64 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Tamanhos
                                </label>

                                <div class="flex gap-2 flex-wrap items-center">
                                    @foreach ($tamanhos as $tamanho)
                                        <label
                                            class="appearance-none font-semibold text-gray-700 leading-tight focus:outline-none focus:bg-white"
                                            for="checked-checkbox">
                                            <input wire:model='form.tamanho' class=""
                                                value="{{ $tamanho->id }}" id="checked-checkbox" type="checkbox">

                                            {{ $tamanho->descricao }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            @error('form.tamanho')
                                <span class="error">{{ $message }}</span>
                            @enderror

                            <div class="w-full md:w-64 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Categoria
                                </label>

                                <select wire:model='form.categoria'
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                    <option value="">Selecione</option>

                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-full md:w-80">
                                <label class="block mb-2 text-sm font-medium text-gray-900"
                                    for="file_input">Imagem</label>
                                <input
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                    aria-describedby="file_input_help" id="file_input" type="file">
                            </div>

                            @error('form.categoria')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex justify-center mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                {{ $form->itemId ? 'Salvar' : 'Cadastrar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
