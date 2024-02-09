<div>
    {{-- <div class="flex flex-col w-full">

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

    </div> --}}
    <div class="absolute right-2">
        <button x-data x-on:click="$dispatch('open-modal')"
            class="text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 transition-all hover:scale-105"
            type="button">
            Novo Pedido
        </button>
    </div>

    <x-modal>
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-3">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Cliente</p>

                        <div class="flex item-center">
                            <x-input value="{{ $cliente->nome ?? '' }}" class="w-80"></x-input>

                            <button type="button" x-data x-on:click="$dispatch('open-detalhe', { name : 'clientes' })"
                                class="p-2 text-white bg-blue-500 rounded-r">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                </svg>

                            </button>
                        </div>

                    </label>

                    <label class="max-w-56">
                        <p class="text-sm font-semibold uppercase text-gray-100">Forma de Pagamento</p>
                        <select wire:model="form.pagamento"
                            class="w-56 p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white">
                            <option class="font-semibold" value="">Selecione</option>

                            @foreach ($pagamentos as $pagamento)
                            <option class="font-semibold" value="{{ $pagamento->id }}">{{ $pagamento->nome }}</option>
                            @endforeach
                        </select>
                    </label>

                    <label>
                        <p class="text-sm font-semibold uppercase text-gray-100">descrição</p>
                        <textarea wire:model="form.descricao"
                            class="w-full p-3 pl-2 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                            id="" rows="3"></textarea>
                    </label>

                    <div class="flex justify-center">
                        <button type="submit" class="p-2 font-semibold text-white rounded bg-green-600">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        @endslot
    </x-modal>

    {{-- @if ($showAutenticacao)
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
    @endif --}}
</div>
