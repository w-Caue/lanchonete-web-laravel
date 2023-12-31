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

        <div class="flex justify-end m-5">
            <button wire:click.prevent="novoPedido()"
                class="flex font-semibold text-md text-gray-700 p-2 shadow border rounded hover:shadow-xl">
                <svg class="w-6 h-6 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 5h4m-2 2V3M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.938-11H17l-2 7H5m0 0L3 4m0 0h2M3 4l-.792-3H1" />
                </svg>
                Novo Pedido
            </button>
        </div>

    </div>

    <div class="">
        <div class="flex justify-center overflow-x-auto mx-5">
            <table class="w-11/12 text-sm text-left text-gray-500 shadow-md sm:rounded-lg">
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
                                Forma de Pagamento
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Total do Itens
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Total do Pedido
                                <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        </th>

                        <th scope="col" class="">

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
                                {{ $pedido->descricao }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pedido->status }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $pedido->formaPagamento->nome }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($pedido->total_itens, 2, ',') }}
                            </td>
                            <td class="px-6 py-4">
                                {{ number_format($pedido->total_pedido, 2, ',') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if ($pedido->status == 'Concluido' or $pedido->status == 'Entrega')
                                    <a wire:click="mostrarPedido({{ $pedido->id }})"
                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Visualizar</a>
                                @endif

                                @if ($pedido->status == 'Aberto')
                                    <a wire:click="mostrarPedido({{ $pedido->id }})"
                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Adicionar
                                        Itens</a>
                                @endif

                                @if ($pedido->status == 'Preparo')
                                    <a wire:click="mostrarPedido({{ $pedido->id }})"
                                        class="font-medium text-blue-600 hover:underline cursor-pointer">Finalizar</a>
                                @endif

                                @if ($pedido->status == 'Analise' && $pedido->site == 'S')
                                    <a wire:click="mostrarPedido({{ $pedido->id }})"
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
            <div class="fixed top-32 bg-gray-50 w-3/6 shadow-2xl rounded-lg border">

                <div class="rounded-t-lg mb-1 flex justify-end">
                    <button wire:click.prevent='fecharPedido()'
                        class="rounded border m-2 hover:text-white hover:bg-red-500">
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
                                name="cliente" wire:click.prevent="mostrarClientes()">
                                {{ $clienteSelecionado->nome ?? 'Clique para selecionar o cliente' }}
                            </button>

                        </div>

                        <div class="ml-3">
                            <select wire:model="form.formaPagamento" name="formaPagamento"
                                class="bg-gray-50 border-2 border-gray-300 text-gray-900 font-semibold text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5"
                                aria-label="Default select example">
                                <option></option>

                                @foreach ($formasDePagamentos as $formaDePagamento)
                                    <option value="{{ $formaDePagamento->id }}"
                                        class="font-semibold text-md text-gray-600"
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
                                class="block p-2.5 w-full font-semibold text-md text-gray-800 bg-gray-50 rounded-lg border border-gray-300"
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
            <div class="fixed top-20 bg-gray-50 w-1/2 shadow-2xl border rounded-lg">

                <div class="flex justify-end m-2">
                    <button wire:click="fecharPedido()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center tracking-widest mb-4">Pedido</h1>

                @if ($pedidoCliente->status == 'Aberto' or $pedidoCliente->status == 'Analise' or $pedidoCliente->status == 'Preparo')
                    <form wire:submit.prevent="editarPedido()">
                    @else
                        <form wire:submit.prevent="concluirPedido()">
                @endif

                @if ($pedidoCliente->status == 'Preparo' && $pedidoCliente->site == 'S')
                    <form wire:submit.prevent="editarPedido()">
                    @else
                        <form wire:submit.prevent="concluirPedido()">
                @endif

                <div class="m-3 flex justify-between items-center gap-2">
                    <div>
                        <h1 class="text-xl font-semibold tracking-wider">Forma de pagamento </h1>
                        <select wire:model.live='form.formaPagamento' name="formaPagamento"
                            class="font-semibold w-44 p-1 border-2 rounded" aria-label="Default select example">

                            @foreach ($formasDePagamentos as $formaDePagamento)
                                <option class="font-semibold" value="{{ $formaDePagamento->id }}">
                                    {{ $formaDePagamento->nome }}</option>
                            @endforeach

                        </select>
                        @error('form.formaPagamento')
                            <p class="font-semibold text-gray-400">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($pedidoCliente->status == 'Aberto')
                        <div class="m-3">
                            <button wire:click.prevent="mostrarItens()"
                                class="font-semibold text-md p-2 border rounded">Adicionar
                                Itens</button>
                        </div>
                    @else
                        <div>
                            <select wire:model.live='statusPedido' name="status"
                                class="font-semibold w-44 p-1 border-2 rounded">

                                @foreach ($statusPedidos as $status)
                                    <option class="font-semibold" value="{{ $status->nome }}">
                                        {{ $status->nome }}</option>
                                @endforeach

                            </select>
                        </div>
                    @endif
                </div>

                <div class="relative overflow-x-auto shadow-md border sm:rounded-lg m-2">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase">
                            <tr>
                                <th scope="col" class="px-6 py-3 bg-gray-50">
                                    Nome
                                </th>
                                <th scope="col" class="px-6 py-3 bg-gray-50">
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
                                <tr class="border-b border-gray-200">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50">
                                        {{ $item->nome }}
                                    </th>
                                    <td class="px-6 py-4 bg-gray-50">
                                        {{ number_format($item->preco, 2, ',') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->pivot->quantidade }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ number_format($item->pivot->total, 2, ',') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($pedidoCliente->status == 'Aberto')
                                            <button wire:click.prevent="removerItem({{ $item->id }})"
                                                class="text-red-500 font-semibold hover:underline">
                                                remover
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="font-semibold text-gray-900">
                                <th scope="row" class="px-6 py-3 text-base">Total</th>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3">
                                    <h1 wire:model.live="totalPedido">{{ number_format($totalItens, 2, ',') }}</h1>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                @if ($pedidoCliente->local_entrega_id > 0)
                    <div class="w-1/2 m-3">
                        <h1 class="text-xl font-semibold tracking-wider">Local de Entrega</h1>
                        <a
                            class="flex flex-wrap gap-5 max-w-sm p-2 rounded border shadow m-2 hover:bg-gray-100 cursor-pointer">
                            <p class="font-semibold text-gray-700">Cep: {{ $pedidoCliente->localEntrega->cep }}</p>
                            <p class="font-semibold text-gray-700">Rua: {{ $pedidoCliente->localEntrega->endereco }}
                            </p>
                            <p class="font-semibold text-gray-700">N° {{ $pedidoCliente->localEntrega->numero }}</p>
                            <p class="font-semibold text-gray-700">Bairro: {{ $pedidoCliente->localEntrega->bairro }}
                            </p>
                        </a>
                    </div>
                @endif

                <div class="m-3 max-w-lg">
                    <textarea wire:model="form.descricao" value="{{ $pedidoCliente->descricao }}"
                        class="block p-2.5 w-full text-lg font-semibold text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        id="exampleFormControlTextarea1" placeholder="Adicione uma descrição para seu pedido" rows="3">{{ $pedidoCliente->descricao }}</textarea>
                </div>

                <div class="flex justify-center gap-2 mb-2">
                    @if ($pedidoCliente->status == 'Preparo' or $pedidoCliente->status == 'Concluido')
                        <button type="submit"
                            class="font-semibold p-2 border rounded hover:text-white hover:bg-purple-500">
                            Salvar Pedido
                        </button>
                    @else
                        <button type="submit"
                            class="font-semibold p-2 border rounded hover:text-white hover:bg-blue-500">
                            Finalizar Pedido
                        </button>
                    @endif

                </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Pesquisar Cliente --}}
    @if ($showCliente)
        <div class="flex justify-center">
            <div class="fixed top-44 bg-white w-1/2 shadow-2xl rounded-lg border">
                <div class="rounded-t-lg mb-1 flex justify-end ">
                    <button wire:click.prevent='mostrarClientes()'
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

    {{-- Itens --}}
    @if ($showItens)
        <div class="flex justify-center">
            <div class="fixed top-36 bg-white w-1/2 shadow-2xl border rounded-lg">
                <div class="rounded-t-lg mb-1 flex justify-end ">
                    <button wire:click.prevent='fecharItens()'
                        class="rounded m-2 border hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-center items-center gap-1 m-2">
                    <input wire:model.lazy="search" type="text" name="seach"
                        class="appearance-none block w-full md:w-1/3 text-gray-700 border rounded p-3 leading-tight focus:outline-none focus:bg-white"
                        value="" placeholder="Pesquisar Item">
                    <button class="bg-blue-500 text-white p-2 border border-blue-500 hover:border-transparent rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </button>
                </div>

                <div class="flex justify-center flex-wrap gap-3 mb-5">
                    @foreach ($itens as $item)
                        <div wire:click.prevent='item({{ $item->id }})'
                            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-60 hover:bg-gray-100 cursor-pointer">
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
    @if ($detalheItem)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-80 shadow-2xl rounded-lg">

                <div class=" mt-5">
                    <form wire:submit.prevent="adicionarItem({{ $itemPedido->id }})" class="flex flex-col">
                        <div class="flex items-center gap-1 m-4">
                            <label for="quantidade" class="text-xl font-semibold text-gray-600">Quantidade</label>
                            <div class="flex gap-1 flex-wrap">
                                <button wire:click.prevent="increment" class="border rounded p-1 text-2xl"> +
                                </button>

                                <input wire:model.live="quantidade" class="text-center font-semibold" type="number"
                                    name="quantidade" style="max-width: 3.5rem">

                                <button wire:click.prevent="decrement" class="border rounded p-1 text-2xl"> -
                                </button>
                            </div>
                        </div>

                        <div class="m-4">
                            <h1 class="text-lg font-semibold text-gray-600">Tamanho</h1>

                            <div class="flex gap-1 flex-wrap">
                                @foreach ($tamanhos as $tamanho)
                                    <input wire:model="tamanhosItens" class="" value="{{ $tamanho->tamanho }}"
                                        id="checked-checkbox" type="checkbox">

                                    <label class="text-gary-500 font-semibold"
                                        for="checked-checkbox">{{ $tamanho->descricao }}</label>
                                @endforeach
                            </div>
                        </div>

                        <div class="m-4">
                            <div class="flex flex-wrap items-center gap-1 ">
                                <h1 for="total" class="text-lg font-semibold text-gray-600">Total:</h1>
                                <h1 class="text-lg font-medium bg-gray-100 p-2 rounded">
                                    {{ number_format($totalItens, 2, ',') }}</h1>
                            </div>
                        </div>

                        <div class="flex justify-center m-3">
                            <button type="submit"
                                class="border p-2 rounded font-semibold hover:text-white hover:bg-blue-500">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($showAutenticacao)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-96 shadow-2xl rounded-lg">
                <div class="m-3">
                    <h1 class="text-xl font-semibold tracking-wider">Forma de pagamento </h1>
                    <select wire:model.live='form.formaPagamento' name="formaPagamento"
                        class="font-semibold w-44 p-1 border-2 rounded" aria-label="Default select example">

                        @foreach ($formasDePagamentos as $formaDePagamento)
                            <option class="font-semibold" value="{{ $formaDePagamento->id }}">
                                {{ $formaDePagamento->nome }}</option>
                        @endforeach

                    </select>
                    @error('form.formaPagamento')
                        <p class="font-semibold text-gray-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="m-3 flex flex-wrap gap-1">
                    <h1 class="text-xl text-gray-700 font-semibold tracking-wider">Desconto </h1>
                    <input wire:model.live="desconto" type="number"
                        class="w-16 border border-gray-400 rounded text-md font-semibold text-gray-900 p-1">
                </div>

                <div class="m-3 flex flex-wrap justify-end gap-1">
                    <h1 class="text-xl text-gray-600 font-semibold tracking-wider">Total do Pedido: </h1>
                    <h1 wire:model.live="totalPedido" class="text-xl text-gray-900 font-semibold tracking-wider">
                        {{ number_format($totalPedido, 2, ',') }} </h1>
                </div>

                <div class="m-3 max-w-lg">
                    <textarea wire:model="form.descricao" value="" @disabled(true)
                        class="block p-2.5 w-full text-lg font-semibold text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Descrição do Pedido" rows="3"></textarea>
                </div>

                <div class="m-2 flex justify-center">
                    <button type="submit"
                        class="font-semibold p-2 border rounded hover:text-white hover:bg-blue-500">
                        Concluir Pedido
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
