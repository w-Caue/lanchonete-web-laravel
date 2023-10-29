<div>
    <div class="flex flex-col w-full">

        <h1 class="text-center text-2xl font-semibold ">Cardapio</h1>
        <h1 class="text-center text-xl font-semibold text-gray-500 mb-5">Adicione os Itens ao Pedido</h1>

        <div class="flex justify-center">
            <button wire:click="visualizarPedido()"
                class="flex gap-1 font-semibold text-gray-600 tracking-widest rounded p-2 hover:bg-gray-300">
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
                <div wire:click='setItem({{ $item->id }})'
                    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-1/3 hover:bg-gray-100 cursor-pointer">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                        src="/docs/images/blog/image-4.jpg" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900">{{ $item->nome }}</h5>
                        <p class="mb-1 font-semibold text-gray-600">{{ $item->descricao }}</p>
                        <p class="mb-1 font-semibold text-gray-900">R${{ number_format($item->preco, 2, ',', '.') }}</p>
                        <p class="mb-1 font-semibold text-blue-900">{{ $item->tamanho->descricao }}</p>
                        <p class="mb-1 font-semibold text-sky-700">{{ $item->categoria->categoria }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    {{-- Adicionar Item --}}
    @if ($addItem)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-96 shadow-2xl rounded-lg">

                <div class="flex float-right m-3">
                    <button wire:click="item()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

                <div class="m-5">
                    <h1 class="text-xl font-semibold  text-center">{{ $itemSelect->nome }}</h1>
                </div>

                <div class="flex justify-center ">
                    <form wire:submit.prevent="pedidoItem({{ $itemSelect->id }})" class="">
                        @csrf

                        <div class="mb-3">
                            <label for="quantidade" class="text-lg font-semibold text-blue-400">Quantidade</label>
                            <div class="flex gap-1 flex-wrap">
                                <button wire:click.prevent="increment" class="border rounded p-1 text-2xl"> + </button>

                                <input wire:model="count" class="text-center font-semibold" type="number"
                                    placeholder="0" name="quantidade" style="max-width: 3.5rem">

                                <button wire:click.prevent="decrement" class="border rounded p-1 text-2xl"> - </button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <h1 class="text-lg font-semibold text-blue-400">Tamanho</h1>

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
                                <h1 for="total" class="text-lg font-semibold text-blue-400">Total:</h1>
                                <h1 class="text-lg font-medium">R${{ number_format($total, 2, ',', '.') }}</h1>
                            </div>
                        </div>

                        <div class="flex justify-center m-3">
                            <button type="submit"
                                class="border p-2 rounded bg-blue-500 text-white font-medium hover:bg-blue-600">Adicionar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    @endif

    {{-- Criar Pedido --}}
    @if ($criaPedido)
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-1/2 shadow-2xl rounded-lg">

                <h1 class="text-xl font-semibold text-center tracking-widest m-5">Criar Pedido</h1>


                <form wire:submit.prevent="save()" class="flex flex-col">
                    @csrf

                    <div class="flex flex-col gap-2">

                        <div class="mb-2 flex justify-center">
                            <input wire:model="userCliente"
                                class="text-xl text-center text-white tracking-widest bg-blue-500 font-semibold border rounded w-75"
                                name="cliente" value="{{ Auth::user()->name }}">
                        </div>

                        <div class="m-5">
                            <h1 class="text-lg font-semibold tracking-wider">Telefone</h1>
                            <input wire:model="form.telefone" class="border-2 p-1 rounded w-25" type="number"
                                placeholder="P/ Contato">

                            @error('form.telefone')
                                <p class="font-semibold text-gray-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="m-5">
                            <h1 class="text-lg font-semibold tracking-wider">Forma de pagamento </h1>
                            <select wire:model="form.formaPagamento" name="formaPagamento"
                                class="font-semibold p-1 border-2 rounded" aria-label="Default select example">

                                <option value=""></option>

                                @foreach ($formasDePagamentos as $formaDePagamento)
                                    <option value="{{ $formaDePagamento->id }}"
                                        {{ ($pedido->forma_de_pagamento_id ?? old('formaDePagamento->id ')) == $formaDePagamento->id ? 'selected' : '' }}>
                                        {{ $formaDePagamento->nome }}</option>
                                @endforeach

                            </select>
                            @error('form.formaPagamento')
                                <p class="font-semibold text-gray-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="m-5">
                            <label for="exampleFormControlTextarea1"
                                class="text-lg font-semibold tracking-wider">Descrição</label>
                            <textarea wire:model="form.descricao"
                                class="block p-2.5 w-full text-lg font-semibold tracking-wider text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                    </div>

                    <div class="flex justify-center gap-3 mb-4">
                        <button type="submit" class="text-white font-semibold p-2 border rounded bg-blue-500">Criar
                            Pedido</button>
                    </div>

                </form>

            </div>
        </div>

    @endif

    {{-- Visualizar o Pedido --}}
    @if ($meuPedido)
        <div class="flex justify-center">
            <div class="fixed top-20 bg-white w-1/2 shadow-2xl rounded-lg">

                <div class="flex justify-end m-2">
                    <button wire:click="visualizarPedido()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center tracking-widest m-3">Meu Pedido</h1>

                <div class="m-3 flex gap-2">
                    <h1 class="text-xl font-semibold tracking-wider">Forma de pagamento: </h1>
                    <select wire:model='form.formaPagamento' name="formaPagamento"
                        class="font-semibold border-2 rounded" aria-label="Default select example">

                        @foreach ($formasDePagamentos as $formaDePagamento)
                            <option class="font-semibold" value="{{ $formaDePagamento->id }}"
                                {{ ($pedido->forma_de_pagamento_id ?? old('formaDePagamento->id ')) == $formaDePagamento->id ? 'selected' : '' }}>
                                {{ $formaDePagamento->nome }}</option>
                        @endforeach

                    </select>
                    @error('form.formaPagamento')
                        <p class="font-semibold text-gray-400">{{ $message }}</p>
                    @enderror
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
                                            {{ $pedido->pedidoItem }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-semibold text-gray-900 ">
                                    <th scope="row" class="px-6 py-3 text-base">Total</th>
                                    <td class="px-6 py-3"></td>
                                    <td class="px-6 py-3">{{ $pedido->total }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <hr class="my-5">

                <div class="flex items-center m-3 gap-1">
                    <label for="countries" class="text-xl font-semibold tracking-wider">Tipo</label>

                    <div>
                        <input wire:model.live="pedidoEntrega" wire:click="entregaDePedido()" class=""
                            value="entrega" type="radio">

                        <label class="text-gray-500 font-semibold">Entrega</label>
                    </div>

                    <div>
                        <input wire:model.live="pedidoEntrega" class="rounded"
                            value="retirada" type="radio">

                        <label class="text-gray-500 font-semibold">Retirada</label>
                    </div>


                    {{-- <select wire:model.live="pedidoEntrega" wire:click="entregaDePedido()" id="countries"
                        class="font-semibold border-2 rounded">
                        <option selected></option>
                        <option class="font-semibold" value="entrega">Entrega</option>
                        <option class="font-semibold" value="retirada">Retirada</option>
                    </select> --}}
                </div>

                <div class="m-5 max-w-xs">
                    @if ($statusEntrega)
                        <p
                            class="text-lg font-semibold text-green-600 bg-gray-100 shadow p-2 rounded flex flex-wrap gap-1 ">
                            Endereço De Entrega Salvo
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.633 10.5c.806 0 1.533-.446 2.031-1.08a9.041 9.041 0 012.861-2.4c.723-.384 1.35-.956 1.653-1.715a4.498 4.498 0 00.322-1.672V3a.75.75 0 01.75-.75A2.25 2.25 0 0116.5 4.5c0 1.152-.26 2.243-.723 3.218-.266.558.107 1.282.725 1.282h3.126c1.026 0 1.945.694 2.054 1.715.045.422.068.85.068 1.285a11.95 11.95 0 01-2.649 7.521c-.388.482-.987.729-1.605.729H13.48c-.483 0-.964-.078-1.423-.23l-3.114-1.04a4.501 4.501 0 00-1.423-.23H5.904M14.25 9h2.25M5.904 18.75c.083.205.173.405.27.602.197.4-.078.898-.523.898h-.908c-.889 0-1.713-.518-1.972-1.368a12 12 0 01-.521-3.507c0-1.553.295-3.036.831-4.398C3.387 10.203 4.167 9.75 5 9.75h1.053c.472 0 .745.556.5.96a8.958 8.958 0 00-1.302 4.665c0 1.194.232 2.333.654 3.375z" />
                            </svg>
                        </p>
                    @endif
                </div>

                <div class="m-3 max-w-lg">
                    <textarea wire:model="form.descricao" value="{{ $pedido->descricao }}"
                        class="block p-2.5 w-full text-lg font-semibold text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                        id="exampleFormControlTextarea1" placeholder="Adicione uma descrição para seu pedido" rows="3"></textarea>
                </div>



                <div class="flex justify-center gap-2 mb-2">

                    <a href="{{ $pedido->id }}" wire:click.prevent="finalizarPedido()"
                        wire:click="update({{ $pedido->id }})"
                        class="text-white font-semibold p-2 border rounded bg-blue-500">Finalizar
                        Pedido
                    </a>

                </div>

            </div>
        </div>
    @endif

    @if ($entrega)  
        <div class="flex justify-center">
            <div class="fixed top-32 bg-white w-1/2 border-2 border-blue-100 shadow-2xl rounded-lg">

                <div class="flex float-right m-3">
                    <button wire:click="visualizarEntrega()" class="border rounded hover:bg-red-500 hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-xl font-semibold text-center tracking-widest mb-5">Selecione o Local</h1>

                @if (count($localSalvo) > 0)

                    <div class="w-96 flex justify-center">
                        @foreach ($localSalvo as $local)
                            <a wire:click="localizacaoEntrega({{ $local->id }})"
                                class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-xl m-2 hover:bg-gray-100 cursor-pointer">
                                <h5 class="mb-2 font-semibold tracking-tight text-gray-900 "><span
                                        class="text-gray-700">Cep:</span> {{ $local->cep }}</h5>
                                <p class="font-semibold text-gray-700">{{ $local->endereco }}</p>
                                <p class="font-semibold text-gray-700">N - {{ $local->numero }}</p>
                                <p class="font-semibold text-gray-700">{{ $local->bairro }}</p>
                            </a>
                        @endforeach

                    </div>
                @else
                    <div class="m-5">
                        <div class="flex flex-wrap gap-1">

                            <label class="m-2">
                                <span for="cep" class="text-lg font-semibold text-gray-700">Cep</span>
                                <div class="flex flex-row">
                                    <input wire:model.lazy="cep" type="number"
                                        class="border rounded p-1 w-32 text-semibold text-gray-500" id="cep"
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
                                    class="border rounded p-1 w-64 text-semibold text-gray-500" id="endereco"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Número</span>
                                <input wire:model.defer="numero" type="number"
                                    class="border rounded p-1  w-16 text-semibold text-gray-500" id="numero"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Complemento</span>
                                <input wire:model.defer="complemento" type="text"
                                    class="border rounded p-1  w-75 text-semibold text-gray-500" id="complemento"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Ponto de Referencia</span>
                                <input wire:model.defer="referencia" type="text"
                                    class="border rounded p-1 w-100 text-semibold text-gray-500" id="complemento"
                                    placeholder="">
                            </label>

                            <label class="m-2 flex flex-col">
                                <span class="text-lg font-semibold text-gray-700">Bairro</span>
                                <input wire:model.defer="bairro" type="text"
                                    class="border rounded p-1 w-100 text-semibold text-gray-500" id="bairro"
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
