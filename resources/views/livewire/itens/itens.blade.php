<div>
    <div class="flex flex-col w-full">

        <div class="mb-4">
            <h4 class="text-center text-lg font-medium">Pesquisa</h4>

            <div class="flex justify-center items-center gap-1">
                <input wire:model.lazy="search" type="text" name="seach"
                    class="appearance-none block w-full md:w-1/3 text-gray-700 border rounded p-3 leading-tight focus:outline-none focus:bg-white"
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

        <div class="flex justify-end m-5 ">
            <button wire:click='novoItem()'
                class="text-lg text-gray-600 font-semibold flex items-center gap-1 p-2 shadow-xl border rounded-lg hover:bg-blue-500 hover:text-white hover:shadow-2xl">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 5.757v8.486M5.757 10h8.486M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                Novo Item
            </button>
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
            <div class="fixed top-14 bg-gray-50 w-80 sm:w-1/2  shadow-2xl border rounded-lg">

                <div class="flex justify-between m-1">
                    <h1 class="text-center font-bold text-gray-700 text-2xl tracking-widest mb-2">Item</h1>

                    <button wire:click.prevent='fecharItem()'
                        class="border rounded m-2 hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-center">
                    <form wire:submit.prevent="{{ $form->itemId ? 'update()' : 'save()' }}" class="w-full max-w-2xl">
                        <div class="flex flex-wrap m-3">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-sm font-semibold text-gray-900"
                                    for="nome">
                                    Nome
                                </label>
                                <input wire:model='form.nome'
                                    class="appearance-none w-full text-gray-700 font-semibold border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="nome" type="text">
                            </div>

                            @error('form.nome')
                                <span class="error ml-5 text-md font-semibold text-gray-500">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-wrap m-3">
                            <div class="w-full px-3 md:w-2/3">
                                <label class="uppercase tracking-wide text-sm font-semibold text-gray-900"
                                    for="descricao">
                                    Descrição
                                </label>
                                <input wire:model='form.descricao'
                                    class="appearance-none w-full text-gray-700 font-semibold border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="descricao" type="text">
                            </div>

                            @error('form.descricao')
                                <span class="error ml-5 text-md font-semibold text-gray-500">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-wrap m-3">
                            <div class="w-full md:w-32 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-sm font-semibold text-gray-900"
                                    for="preco">
                                    Preço
                                </label>
                                <input wire:model='form.preco'
                                    class="appearance-none w-full text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="preco" type="text">
                            </div>

                            @error('form.preco')
                                <span class="error ml-5 text-md font-semibold text-gray-500">{{ $message }}</span>
                            @enderror

                            <div class="w-full md:w-64 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-sm font-semibold text-gray-900"
                                    for="grid-first-name">
                                    Tamanhos
                                </label>

                                <div class="flex gap-2 flex-wrap items-center">
                                    @foreach ($tamanhos as $tamanho)
                                        <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                                            <input wire:model="form.tamanho"
                                                class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-blue-500 checked:bg-blue-500 checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent"
                                                type="checkbox" id="inlineCheckbox1"
                                                value="{{ $tamanho->tamanho }}" />
                                            <label class="inline-block font-semibold pl-[0.15rem] hover:cursor-pointer"
                                                for="inlineCheckbox1">{{ $tamanho->descricao }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            @error('form.tamanho')
                                <span class="error ml-5 text-md font-semibold text-gray-500">{{ $message }}</span>
                            @enderror

                            <div class="w-full md:w-64 px-3 mb-6 md:mb-0">
                                <label class="uppercase tracking-wide text-sm font-semibold text-gray-900"
                                    for="">
                                    Categoria
                                </label>

                                <select wire:model='form.categoria'
                                    class="appearance-none block w-full font-bold text-gray-500 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
                                    <option class="font-bold text-gray-500" value="">Selecione</option>

                                    @foreach ($categorias as $categoria)
                                        <option class="font-bold text-gray-500" value="{{ $categoria->id }}">
                                            {{ $categoria->categoria }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @error('form.categoria')
                                <span class="error ml-5 text-md font-semibold text-gray-500">{{ $message }}</span>
                            @enderror

                            <div class="w-full md:w-80 m-3">
                                <label class="uppercase tracking-wide text-sm font-semibold text-gray-900"
                                    for="file_input">Imagem</label>

                                <input
                                    class="relative cursor-pointer m-0 block w-full min-w-0 flex-auto rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] text-base font-bold text-blue-500 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-blue-500 file:px-3 file:py-[0.32rem] file:text-white file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] focus:border-blue-500 focus:shadow-te-primary focus:outline-none"
                                    type="file" multiple />

                            </div>

                        </div>

                        <div class="flex justify-center m-3">
                            <button type="submit"
                                class="font-bold text-gray-600 py-2 px-4 border rounded hover:bg-blue-500 hover:text-white">
                                {{ $form->itemId ? 'Salvar' : 'Cadastrar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
