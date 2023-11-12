<div>
    <div class="flex flex-col w-full">

        <h1 class="text-center text-2xl font-semibold ">Cardapio</h1>
        <h1 class="text-center text-xl font-semibold text-gray-500 mb-5">Adicione os Itens ao Pedido</h1>

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

        <div class="flex justify-center">
            <button wire:click="mostrarPedido()"
                class="flex gap-1 font-semibold text-gray-700 tracking-widest border rounded p-2 hover:bg-blue-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>

                Seu Pedido
            </button>
        </div>

        <hr class="h-px my-8 bg-gray-200 border-0 ">

        <div class="flex justify-center flex-wrap gap-3">
            @foreach ($itens as $item)
                <div wire:click='selecionarItem({{ $item->id }})'
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

    </div>

    {{-- Criar Pedido --}}
    @if ($criarPedido)
        <div class="flex justify-center">
            <div class="fixed top-20 bg-gray-50 sm:w-2/5 shadow-2xl rounded-lg border">

                <h1 class="text-xl font-semibold text-center tracking-widest m-5">Criar Pedido</h1>

                <form wire:submit.prevent="save()" class="flex flex-col">

                    <div class="flex flex-col gap-2">
                        <div class="mb-2 flex justify-center">
                            <input wire:model="userCliente"
                                class="text-xl text-center text-white tracking-widest bg-blue-500 font-semibold border rounded w-75"
                                name="cliente" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="m-2">
                            <h1 class="text-lg font-semibold tracking-wider">Whatsapp</h1>
                            <input wire:model="form.telefone"
                                class="border-2 p-1 rounded w-40 font-semibold text-gray-900" type="number"
                                value="{{ Auth::user()->telefone }}">

                                <p class="text-sm font-semibold text-gray-500 m-1">Com o seu Whatsapp vamos conseguir lhe informar sobre o seu pedido.</p>

                            @error('form.telefone')
                                <p class="font-semibold text-gray-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="m-2">
                            <h1 class="text-lg font-semibold tracking-wider">Forma de pagamento </h1>
                            <select wire:model="form.formaPagamento" name="formaPagamento"
                                class="p-1 border-2 rounded font-semibold text-gray-900"
                                aria-label="Default select example">

                                <option value=""></option>

                                @foreach ($formasDePagamentos as $formaDePagamento)
                                    <option class="font-semibold text-gray-900" value="{{ $formaDePagamento->id }}"
                                        {{ ($pedido->forma_de_pagamento_id ?? old('formaDePagamento->id ')) == $formaDePagamento->id ? 'selected' : '' }}>
                                        {{ $formaDePagamento->nome }}</option>
                                @endforeach

                            </select>
                            @error('form.formaPagamento')
                                <p class="font-semibold text-gray-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="m-2">
                            <textarea wire:model="form.descricao"
                                class="block p-2.5 w-full text-lg font-semibold tracking-wider text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                id="exampleFormControlTextarea1" rows="3" placeholder="Adicione uma descricão...">
                            </textarea>
                        </div>

                    </div>

                    <div class="flex justify-center gap-3 mb-4">
                        <button type="submit"
                            class="font-semibold p-2 border rounded hover:bg-blue-500 hover:text-white">Criar
                            Pedido</button>
                    </div>

                </form>
            </div>
        </div>
    @endif

    {{-- Visualizar o Pedido --}}
    @if ($showPedido)
        <div class="flex justify-center">
            <div class="fixed top-20 bg-white w-1/2 shadow-2xl rounded-lg">

                <div class="flex justify-end m-2">
                    <button wire:click="fecharPedido()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center tracking-widest m-3">Pedido</h1>

                <form wire:submit.prevent="finalizarPedido()">
                    <div class="m-3 flex flex-col">
                        <h1 class="text-xl font-semibold tracking-wider">Forma de pagamento </h1>
                        <select wire:model='form.formaPagamento' name="formaPagamento"
                            class="font-semibold border-2 rounded w-44 p-2">

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

                    <div class="flex flex-wrap justify-center gap-2 m-1">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg border">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            Nome
                                        </th>

                                        <th scope="col" class="px-6 py-3">
                                            Descrição
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
                                        <tr class="font-semibold text-gray-500 bg-white border-b hover:bg-gray-50">
                                            <th scope="row" class="px-6 py-4 text-gray-700 whitespace-nowrap ">
                                                {{ $item->nome }}
                                            </th>

                                            <td class="px-6 py-4">
                                                {{ $item->descricao }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ number_format($item->preco, 2, ',') }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ $item->pivot->quantidade }}
                                            </td>
                                            <td class="px-6 py-4">
                                                {{ number_format($item->pivot->total, 2, ',') }}
                                            </td>
                                            <td class="px-6 py-4 text-right">
                                                <button wire:click.prevent="removerItem({{ $item->id }})"
                                                    class="font-bold text-red-500 hover:underline">remover</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="flex items-center m-3 gap-1">
                        <ul class="flex gap-3">
                            <li>
                                <input wire:model.live="pedidoEntrega" wire:click="entregaDePedido()" type="radio"
                                    id="entrega" name="hosting" value="entrega" class="hidden peer" required>
                                <label for="entrega"
                                    class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                    <div class="block">
                                        <div class="w-full font-semibold">Entrega</div>
                                    </div>
                                </label>
                            </li>

                            <li>
                                <input wire:model.live="pedidoEntrega" type="radio" id="retirada" name="hosting"
                                    value="retirada" class="hidden peer" required>
                                <label for="retirada"
                                    class="inline-flex items-center justify-between w-full p-2 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer  peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100">
                                    <div class="block">
                                        <div class="w-full font-semibold">Retirada</div>
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="m-3">
                        <textarea wire:model="form.descricao" value="{{ $pedidoCliente->descricao }}"
                            class="block p-2.5 w-full text-lg font-semibold text-gray-900 bg-gray-50 rounded-lg border-2 border-gray-300"
                            id="exampleFormControlTextarea1" placeholder="Adicione uma descrição para seu pedido" rows="3"></textarea>
                    </div>

                    <div class="flex justify-center gap-2 mb-2">
                        <button type="submit" class="text-white font-semibold p-2 border rounded bg-blue-500">
                            Finalizar Pedido
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Adicionar Item --}}
    @if ($showItem)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-gray-50 w-96 shadow-2xl rounded-lg border">

                <div class="flex justify-end m-1">
                    <button wire:click="detalheItem()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center mb-2">{{ $itemPedido->nome }}</h1>

                <div class="flex justify-center">
                    <form wire:submit.prevent="pedidoItem({{ $itemPedido->id }})" class="">
                        <div class="mb-3">
                            <label for="quantidade" class="text-lg font-semibold text-gray-900">Quantidade</label>
                            <div class="flex gap-1 flex-wrap">
                                <button wire:click.prevent="increment" class="border rounded p-1 text-2xl"> +
                                </button>

                                <input wire:model="count" class="text-center font-semibold w-14" type="number"
                                    placeholder="0" name="quantidade">

                                <button wire:click.prevent="decrement" class="border rounded p-1 text-2xl"> -
                                </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h1 class="text-lg font-semibold text-gray-900">Tamanho</h1>

                            <div class="flex gap-2 flex-wrap">
                                @foreach ($tamanhos as $tamanho)
                                    <input wire:model="tamanhoItem" class="" value="{{ $tamanho->id }}"
                                        id="checked-checkbox" type="checkbox">

                                    <label class="text-gary-500 font-semibold"
                                        for="checked-checkbox">{{ $tamanho->descricao }}</label>
                                @endforeach
                            </div>

                        </div>

                        <div class="mb-3">
                            <div class="flex flex-wrap items-center gap-1 ">
                                <h1 for="total" class="text-lg font-semibold text-gray-900">Total:</h1>
                                <h1 class="text-lg font-medium">R${{ number_format($total, 2, ',') }}</h1>
                            </div>
                        </div>

                        <div class="flex justify-center m-3">
                            <button type="submit"
                                class="border p-2 rounded font-medium hover:bg-blue-500 hover:text-white">Adicionar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    @endif

    @if ($showEntrega)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-1/2 border-2 shadow-2xl rounded-lg">

                <div class="flex justify-between m-3 mb-5">
                    <svg class="w-6 h-6 text-gray-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>

                    <h1 class="text-xl font-semibold text-center tracking-widest">Local de Entrega</h1>

                    <button wire:click="fecharEntrega()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                @if (count($localEntrega) > 0)

                    <div class="w-96 flex justify-center">
                        @foreach ($localEntrega as $local)
                            <a wire:click="localizacaoEntrega({{ $local->id }})"
                                class="block max-w-sm p-6 mb-5 bg-white border border-gray-200 rounded-lg shadow-xl m-2 hover:bg-gray-100 cursor-pointer">
                                <p class="font-semibold text-gray-700">{{ $local->endereco }}</p>
                                <p class="font-semibold text-gray-700">N° {{ $local->numero }}</p>
                                <p class="font-semibold text-gray-700">{{ $local->bairro }}</p>
                            </a>
                        @endforeach
                    </div>

                    <div wire:click.prevent="" class="flex justify-center m-5">
                        <button
                            class="p-2 border rounded text-gray-600 font-semibold hover:bg-blue-500 hover:text-white">Novo
                            Local</button>
                    </div>
                @else
                    <div class="m-5">
                        <div class="flex flex-wrap gap-1">
                            <label class="m-2">
                                <span for="cep" class="text-lg font-semibold text-gray-700">Cep</span>
                                <div class="flex flex-row">
                                    <input wire:model.lazy="cep" type="number"
                                        class="border rounded p-1 w-24 font-semibold text-gray-500" id="cep"
                                        placeholder="">
                                    <button type="button" class="rounded p-1 text-white bg-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                        </svg>

                                    </button>
                                </div>
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Endereço</span>
                                <input wire:model.defer="endereco" type="text"
                                    class="border rounded p-1 w-64 font-semibold text-gray-500" id="endereco"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Número</span>
                                <input wire:model.defer="numero" type="number"
                                    class="border rounded p-1 w-11 font-semibold text-gray-500" id="numero"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Complemento</span>
                                <input wire:model.defer="complemento" type="text"
                                    class="border rounded p-1 w-36 font-semibold text-gray-500" id="complemento"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Ponto de Referencia</span>
                                <input wire:model.defer="referencia" type="text"
                                    class="border rounded p-1 w-48 font-semibold text-gray-500" id="complemento"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Bairro</span>
                                <input wire:model.defer="bairro" type="text"
                                    class="border rounded p-1 w-40 font-semibold text-gray-500" id="bairro"
                                    placeholder="">
                            </label>

                        </div>

                        <div class="flex justify-center m-4">
                            <button type="submit" wire:click.prevent="saveLocal()"
                                class="text-md text-white font-semibold bg-blue-500 rounded p-2 hover:bg-blue-600">Salvar
                                Local</button>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
