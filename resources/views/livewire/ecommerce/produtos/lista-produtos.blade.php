<div>
    <div class="bg-indigo-500 py-1 mx-auto text-center">
        <div class="flex justify-center m-2">
            <ul class="flex gap-3">
                <li>
                    <label for="todos"
                        class="inline-flex items-center p-2 text-blue-600 bg-white rounded-xl cursor-pointer transition-all hover:scale-95">
                        <input wire:model.live="menuCategoria" type="radio" id="todos" value=""
                            class="hidden peer" required>

                        <p class="font-semibold">Todos</p>
                    </label>
                </li>

                {{-- @foreach ($categorias as $categoria)
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
                    @endforeach --}}
            </ul>
        </div>
    </div>

    <div wire:init="load" class="flex justify-center flex-wrap gap-3 my-4">
        @foreach ($produtos as $produto)
            <div wire:key="{{ $produto->id }}"
                class="flex flex-col items-center text-gray-900 bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 transition-all cursor-pointer">

                <img wire:click="produto({{ $produto->id }})"
                    class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                    src="/docs/images/blog/image-4.jpg" alt="">
                <div class="w-full flex flex-col gap-3 p-4 leading-normal">
                    <div wire:click="produto({{ $produto->id }})" class="py-2">
                        <h5 class="text-xl font-semibold tracking-tight">{{ $produto->nome }}</h5>
                        <p class="font-semibold text-gray-600">{{ $produto->descricao }}</p>
                        <span
                            class="w-16 font-semibold bg-green-400 p-1 rounded-xl text-white">R${{ number_format($produto->preco, 2, ',', '.') }}</span>
                    </div>

                    {{-- <button
                        wire:click="adicionarItem({{ $produto->id ?? '' }}, '{{ $produto->nome ?? '' }}', '{{ $produto->descricao ?? '' }}', '{{ $produto->preco ?? '' }}')"
                        class=" w-16 flex items-center justify-center gap-1 p-2  text-white font-semibold bg-blue-400 rounded-xl transition-all hover:scale-105">
                        <svg class="w-6 h-6" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M5 3a1 1 0 0 0 0 2h.7l2.1 10.2a3 3 0 1 0 4 1.8h2.4a3 3 0 1 0 2.8-2H9.8l-.2-1h8.2a1 1 0 0 0 1-.8l1.2-6A1 1 0 0 0 19 6h-2.3c.2.3.3.6.3 1a2 2 0 0 1-2 2 2 2 0 1 1-4 0 2 2 0 0 1-1.7-3H7.9l-.4-2.2a1 1 0 0 0-1-.8H5Z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M14 5a1 1 0 1 0-2 0v1h-1a1 1 0 1 0 0 2h1v1a1 1 0 1 0 2 0V8h1a1 1 0 1 0 0-2h-1V5Z"
                                clip-rule="evenodd" />
                        </svg>


                        Adicionar
                    </button> --}}
                    <div class="flex justify-center w-1/5 my-auto">
                        <button class=" dark:text-blue-500">
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>

                        {{-- <span
                            class="w-12 mx-2 font-semibold text-center text-blue-500 text-md">{{ $produto['quantidade'] }}</span> --}}

                        <input class="w-12 mx-2 text-center border rounded" type="text"
                            value="{{ $quantidade }}">

                        <button
                            wire:click="adicionarItem({{ $produto->id ?? '' }}, '{{ $produto->nome ?? '' }}', '{{ $produto->descricao ?? '' }}', 1 ,  '{{ $produto->preco ?? '' }}')"
                            class=" dark:text-blue-500">
                            <svg class="w-5 fill-current" viewBox="0 0 448 512">
                                <path
                                    d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>


            {{-- <div
                class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <a href="#">
                    <img class="rounded-t-lg" src="/docs/images/blog/image-1.jpg" alt="" />
                </a>
                <div class="p-5">

                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                        {{ $produto->nome }}
                    </h5>

                    <p class="mb-3 font-semibold text-gray-700 ">{{ $produto->descricao }}</p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div> --}}
        @endforeach
    </div>

    <x-modal-detalhe>
        @slot('body')
            <div class="grid grid-cols-2 my-4">
                <div>

                </div>
                <div class="flex flex-col gap-3 dark:text-white">
                    <button x-on:click="open = false"
                        class="flex justify-center w-56 gap-2 py-2 border rounded font-semibold text-purple-600 dark:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg>
                        <span>Ir Para o Pedido</span>
                    </button>

                    <h1 class="text-lg font-semibold">{{ $produtoDetalhe->nome ?? '' }}</h1>
                    <p class="text-sm font-semibold text-gray-400">{{ $produtoDetalhe->descricao ?? '' }}</p>
                    {{-- <p class="text-lg text-green-400">R${{ number_format($produtoDetalhe->preco_1, 2, ',')}}</p> --}}
                    <p class="text-lg text-green-400 font-bold">R${{ $produtoDetalhe->preco ?? 2 }}</p>

                    <div>
                        <p>Quant.</p>
                        <input wire:model.live="quantidade" type="number" value="1"
                            class="w-14 text-purple-600 font-semibold text-center bg-gray-100 rounded dark:text-gray-700">
                    </div>

                    <button
                        wire:click="adicionarItem({{ $produtoDetalhe->id ?? '' }}, '{{ $produtoDetalhe->nome ?? '' }}', '{{ $produtoDetalhe->descricao ?? '' }}', '{{ $produtoDetalhe->preco ?? '' }}')"
                        class="flex justify-center w-56 gap-2 py-2 font-semibold text-purple-600 border rounded dark:text-white">
                        <span>Adicionar</span>

                        {{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                            <path
                                d="M2.25 2.25a.75.75 0 0 0 0 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 0 0-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 0 0 0-1.5H5.378A2.25 2.25 0 0 1 7.5 15h11.218a.75.75 0 0 0 .674-.421 60.358 60.358 0 0 0 2.96-7.228.75.75 0 0 0-.525-.965A60.864 60.864 0 0 0 5.68 4.509l-.232-.867A1.875 1.875 0 0 0 3.636 2.25H2.25ZM3.75 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0ZM16.5 20.25a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" />
                        </svg> --}}
                    </button>
                </div>
            </div>
        @endslot
    </x-modal-detalhe>
</div>
