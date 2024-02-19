<div>
    <div class="absolute right-2">
        <button x-data x-on:click="$dispatch('open-modal')"
            class="text-white bg-blue-500 hover:bg-indigo-500 font-medium rounded-lg text-sm px-5 py-2.5 transition-all hover:scale-105"
            type="button">
            Novo Pedido
        </button>
    </div>

    <x-modal title="Criar">
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

    <x-modal-detalhe name="clientes">
        @slot('body')
            <label for="">
                <p class="text-sm font-semibold uppercase text-gray-100">Cliente</p>

                <div class="flex item-center">
                    <x-input value="{{ $cliente->nome ?? '' }}" class="w-80"></x-input>

                    <button type="button" wire:click="pesquisaCliente()" class="p-2 text-white bg-blue-500 rounded-r">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>

                    </button>
                </div>

            </label>

            @if ($pessoas)
                <div class="flex justify-center flex-wrap m-3 overflow-auto h-auto max-h-60">
                    @foreach ($pessoas as $pessoa)
                        <div wire:click="selecionarCliente({{ $pessoa->id }})"
                            class="m-2 p-2 text-gray-700 shadow border rounded w-44 h-24 hover:bg-gray-100 hover:shadow-xl hover:border-2 cursor-pointer dark:text-gray-300 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-none">
                            <h1 class="text-sm  font-semibold">#{{ $pessoa->id }}</h1>
                            <h1 class="text-lg font-semibold ">
                                {{ $pessoa->nome }}</h1>
                            <h1 class="text-sm  font-semibold ">{{ $pessoa->whatsapp }}</h1>
                        </div>
                    @endforeach
                </div>
            @endif
        @endslot
    </x-modal-detalhe>
</div>
