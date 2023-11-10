<div>
    <div class="flex flex-col w-full">

        <div class="m-4">
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

        <div class="flex justify-end gap-1 m-5 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <button wire:click.prevent="novoPedido()" class="font-medium">Criar Pedido</button>
        </div>

    </div>

    <div class="">

        <div class="flex justify-center overflow-x-auto mx-5">
            <table class="w-5/6 text-sm text-left text-gray-500 shadow-md sm:rounded-lg">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Cliente
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Telefone
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Status
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Descrição
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Forma de Pagamento
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                        <tr class="{{ $pedido->site == 'S' ? 'bg-blue-200 border-b' : 'bg-white border-b' }} ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $pedido->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $pedido->cliente->nome }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pedido->telefone }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pedido->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pedido->descricao }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pedido->formaPagamento->nome }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if ($pedido->status == 'Finalizado')
                                    <a wire:click="mostrarPedido({{ $pedido->id }})"
                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Visualizar</a>
                                @endif

                                @if ($pedido->status == 'Aberto')
                                    <a wire:click="mostrarPedido({{ $pedido->id }})"
                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Adicionar
                                        Itens</a>
                                @endif

                                @if ($pedido->status == 'Analise' && $pedido->site == 'S')
                                    <a wire:click="analisarPedido({{ $pedido->id }})"
                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Analisar
                                        Pedido</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="m-5">
            {{ $pedidos->links('layouts.paginate') }}
            {{-- appends($request)-> --}}
        </div>
    </div>

    {{-- Novo Pedido --}}
    @if ($newPedido)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-3/6 shadow-2xl rounded-lg">

                <div class="bg-gray-200 rounded-t-lg mb-2 flex justify-end ">
                    <button wire:click.prevent='novoPedido()' class="rounded m-2 hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-center text-xl font-semibold mb-5">Criar Pedido</h1>

                <form wire:submit.prevent="save()">

                    <div class="flex flex-col gap-2">
                        <div class="mb-4 flex justify-center">

                            <button
                                class="bg-blue-500 border-2 border-blue-500 hover:bg-blue-600 hover:border-blue-600 text-white font-semibold py-2 px-4 rounded"
                                name="cliente" wire:click.prevent="visualizarClientes()">
                                {{ $clienteSelecionado->nome ?? 'Clique para selecionar o cliente' }}
                            </button>

                        </div>

                        <div class="ml-3">
                            <select wire:model="form.formaPagamento" name="formaPagamento"
                                class="bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5"
                                aria-label="Default select example">
                                <option>Forma de Pagamento </option>

                                @foreach ($formasDePagamentos as $formaDePagamento)
                                    <option value="{{ $formaDePagamento->id }}"
                                        {{ ($pedido->forma_de_pagamento_id ?? old('formaDePagamento->id ')) == $formaDePagamento->id ? 'selected' : '' }}>
                                        {{ $formaDePagamento->nome }}</option>
                                @endforeach

                            </select>
                            @error('formaPagamento')
                                <p>{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="m-3 max-w-lg">
                            <textarea wire:model="form.descricao"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                id="exampleFormControlTextarea1" placeholder="Adicione uma descrição para seu pedido" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="flex justify-center m-3">
                        <button type="submit"
                            class="bg-blue-500 border-2 border-blue-500 hover:bg-blue-600 hover:border-blue-600 text-white font-semibold py-1 px-3 rounded">Criar
                            Pedido</button>
                    </div>

                </form>
            </div>
        </div>

    @endif

    {{-- Visualizar o Pedido --}}
    @if ($showPedido)
        <div class="flex justify-center">
            <div class="fixed top-28 bg-white w-1/2 shadow-2xl border rounded-lg">

                <div class="flex justify-end m-2">
                    <button wire:click="fecharPedido()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center tracking-widest mb-4">Pedido</h1>

                <form wire:submit.prevent="finalizarPedido()">
                    <div class="m-3 flex flex-col gap-2">
                        <h1 class="text-xl font-semibold tracking-wider">Forma de pagamento </h1>
                        <select wire:model='formaPagamento' name="formaPagamento"
                            class="font-semibold w-44 p-1 border-2 rounded" aria-label="Default select example">

                            @foreach ($formasDePagamentos as $formaDePagamento)
                                <option class="font-semibold" value="{{ $formaDePagamento->id }}"
                                    {{ ($pedidoCliente->forma_de_pagamento_id ?? old('formaDePagamento->id ')) == $formaDePagamento->id ? 'selected' : '' }}>
                                    {{ $formaDePagamento->nome }}</option>
                            @endforeach

                        </select>
                        @error('form.formaPagamento')
                            <p class="font-semibold text-gray-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg m-1">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Preço
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Quantidade
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">

                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedidoCliente->itens as $item)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $item->nome }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ number_format($item->preco, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->pivot->quantidade }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->pivot->total }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            {{-- <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> --}}
                                        </td>
                                    </tr>s
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="m-3 max-w-lg">
                        <textarea wire:model="form.descricao" value="{{ $pedidoCliente->descricao }}"
                            class="block p-2.5 w-full text-lg font-semibold text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                            id="exampleFormControlTextarea1" placeholder="Adicione uma descrição para seu pedido" rows="3">{{ $pedidoCliente->descricao }}</textarea>
                    </div>

                    <div class="flex justify-center gap-2 mb-2">
                        <button type="submit"
                            class="text-white font-semibold p-2 border rounded bg-blue-500">
                            Finalizar Pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Pesquisar Cliente --}}
    @if ($searchCliente)
        <div class="flex justify-center">
            <div class="fixed top-44 bg-white w-3/5 shadow-2xl rounded-lg">
                <div class="bg-sky-300 rounded-t-lg mb-1 flex justify-end ">
                    <button wire:click.prevent='visualizarClientes()'
                        class="rounded m-1 hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <h1 class="text-center text-xl font-semibold mb-5">Pesquise o Cliente</h1>

                <div class="mb-4">

                    <div class="flex justify-center gap-1">
                        <input wire:model.lazy="searchCli" type="text" name="seach"
                            class="appearance-none block w-full md:w-1/3 bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            value="">
                        <button wire:click="pesquisaCliente()"
                            class="bg-blue-500 text-white p-3 border border-blue-500 hover:border-transparent rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex flex-wrap justify-center gap-3 mb-3">
                    @foreach ($pesquisaClientes as $cliente)
                        <div wire:click="setCliente({{ $cliente->id }})" class="cursor-pointer">
                            <div
                                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-64 hover:bg-gray-100">
                                <div class="flex flex-col justify-between p-4 leading-normal">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $cliente->nome }}</h5>
                                    <p class="mb-3 font-semibold text-gray-500 ">{{ $cliente->email }}</p>
                                    <p class="mb-3 font-semibold text-gray-700 ">{{ $cliente->telefone }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
    @endif

    {{-- Itens No Pedido --}}
    @if ($pedidoItem)
        <div class="flex justify-center">
            <div class="fixed top-28 bg-white w-5/6 shadow-2xl border rounded-lg">
                <div class="bg-blue-500 rounded-t-lg mb-1 flex justify-end ">
                    <button wire:click.prevent='itemNoPedido()' class="rounded m-2 text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <h1 class="text-center text-2xl font-semibold m-5">Adicione os Itens</h1>

                <div class="flex justify-center gap-1 m-4">
                    <input wire:model.lazy="search" type="text" name="seach"
                        class="appearance-none block w-full md:w-1/3 bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                        value="">
                    <button class="bg-blue-500 text-white p-3 border border-blue-500 hover:border-transparent rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-end m-3">
                    <button wire:click="showPedido()"
                        class="flex gap-1 font-semibold text-gray-600 tracking-widest rounded p-2 hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                        Pedido
                    </button>
                </div>

                <div class="flex justify-center flex-wrap gap-3 mb-5">
                    @foreach ($itens as $item)
                        <div wire:click='item({{ $item->id }})'
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 hover:bg-gray-100 cursor-pointer">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                src="/docs/images/blog/image-4.jpg" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $item->nome }}
                                </h5>
                                <p class="mb-1 font-semibold text-gray-600">{{ $item->descricao }}</p>
                                <p class="mb-1 font-semibold text-gray-900">
                                    R${{ number_format($item->preco, 2, ',', '.') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Adicionar Item --}}
    @if ($itemPedido)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-96 shadow-2xl rounded-lg">

                <div class="flex float-right m-3">
                    <button wire:click="visualizarItem()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="m-5">
                    <h1 class="text-xl font-semibold  text-center">{{ $itemSelect->nome }}</h1>
                </div>

                <div class="flex justify-center ">

                    <form wire:submit.prevent="adicionarItem({{ $itemSelect->id }})" class="">
                        <div class="mb-3">
                            <label for="quantidade" class="text-lg font-semibold text-blue-400">Quantidade</label>
                            <div class="flex gap-1 flex-wrap">
                                <button wire:click.prevent="increment" class="border rounded p-1 text-2xl"> +
                                </button>

                                <input wire:model="count" class="text-center font-semibold" type="number"
                                    placeholder="0" name="quantidade" style="max-width: 3.5rem">

                                <button wire:click.prevent="decrement" class="border rounded p-1 text-2xl"> -
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h1 class="text-lg font-semibold text-blue-400">Tamanho</h1>

                            <div class="flex gap-2 flex-wrap">
                                @foreach ($tamanhos as $tamanho)
                                    <input class="" value="{{ $tamanho->id }}" id="checked-checkbox"
                                        type="checkbox">

                                    <label class="text-gary-500 font-semibold"
                                        for="checked-checkbox">{{ $tamanho->descricao }}</label>
                                @endforeach
                            </div>
                        </div>

                        {{-- <div class="mb-3">
                            <div class="flex flex-wrap items-center gap-1 ">
                                <h1 for="total" class="text-lg font-semibold text-blue-400">Total:</h1>
                                <h1 class="text-lg font-medium">R${{ number_format($total, 2, ',', '.') }}</h1>
                            </div>
                        </div> --}}

                        <div class="flex justify-center m-3">
                            <button type="submit"
                                class="border p-2 rounded bg-blue-500 text-white font-medium hover:bg-blue-600">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif


    {{-- Analisar Pedido --}}
    {{-- @if ($pedidoAnalise)
        <div class="flex justify-center">
            <div class="fixed top-16 bg-white w-1/2 shadow-2xl rounded-lg">

                <div class="flex justify-end m-2">
                    <button wire:click="fecharAnalise()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center tracking-widest mb-4">
                    {{ $pedido->status == 'Finalizado' ? 'Pedido Finalizado' : 'Analisar Pedido' }}</h1>

                @if ($pedido->status == 'Finalizado')
                    <div class="flex m-3 gap-2">
                        <h1 class="text-xl font-semibold">Cliente: </h1>
                        <h1 class="text-lg font-bold text-gray-600 tracking-widest">
                            {{ $pedido->cliente->nome }}</h1>
                    </div>
                @endif
                
                <div class="m-3 flex items-center gap-2">
                    <h1 class="text-xl font-semibold tracking-wider">Forma de pagamento: </h1>
                    <p class="text-lg text-gray-600 font-semibold">{{ $pedido->formaPagamento->nome }}</p>
                </div>

                <hr class="my-5">
                
                <div class="flex flex-wrap gap-2 m-3">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 font-semibold uppercase">
                                <tr>
                                    <th scope="col" class="px-6 py-3 ">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Preço
                                    </th>
                                    <th scope="col" class="px-6 py-3 ">
                                        Quantidade
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pedido->itens as $pedido)
                                    <tr class="bg-white ">
                                        <th scope="row"
                                            class="px-6 py-4 font-semibold text-gray-900 whitespace-nowrap">
                                            {{ $pedido->nome }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ number_format($pedido->preco, 2, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $pedido->pivot->quantidade }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 ">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3"></td>
                                    <td class="px-6 py-3">{{ $pedido->pivot->total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <hr class="my-5">

                       

                @if ($pedido->local_entrega_id > 0)
                    <div class="m-3">
                        <h1 class="text-xl font-semibold tracking-wider">Local de Entrega</h1>

                        <div class="flex gap-2 items-center">
                            <p class="text-md text-gray-500 font-semibold">{{ $pedido->localEntrega->cep }}</p>
                            <h1 class="text-md text-gray-700 font-semibold">
                                {{ $pedido->localEntrega->endereco }}</h1>
                            <p class="text-md text-gray-500 font-semibold">n:
                                {{ $pedido->localEntrega->numero }}</p>
                            <p class="text-md text-gray-700 font-semibold">bairro:
                                {{ $pedido->localEntrega->bairro }}</p>
                        </div>
                    </div>
                @endif

                <div class="m-3 max-w-lg">
                    <textarea value="{{ $pedido->descricao }}"
                        class="block p-2.5 w-full text-lg font-semibold text-gray-600 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        id="exampleFormControlTextarea1" placeholder="Adicione uma descrição para seu pedido" rows="3">{{ $pedido->descricao }}</textarea>
                </div>

                <div class="flex justify-center gap-2 mb-2">
                    @if ($pedido->status == 'Analise')
                        <button wire:click.prevent="prepararPedido({{ $pedido->id }})"
                            class="text-white font-semibold p-2 border rounded bg-blue-500">
                            Preparar Pedido
                        </button>
                    @endif
                </div>
            </div>
        </div>
    @endif --}}
</div>
