<div>

    <x-modal.modal-medium title="Pedido de Venda" name="pedido">
        @slot('body')
            <div class="mt-4">
                <form wire:submit="save()" class="flex flex-col gap-3">
                    <label for="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Cliente</p>

                        {{-- <div class="relative w-60">
                            <input value="{{ $cliente->name ?? '' }}"
                                class="block p-3 w-full font-semibold rounded-md uppercase text-xs tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-600 active:ring-purple-500 dark:bg-gray-700 dark:text-gray-300"
                                placeholder="selecione o cliente">

                            <button type="button" 
                                class="absolute top-0 right-0 p-3 text-sm text-gray-500 font-medium rounded transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </div> --}}

                        <div>
                            <x-button.primary type="button" x-data
                                x-on:click="$dispatch('open-modal-small', { name : 'clientes' })">
                                {{ $cliente->name ?? 'selecione o cliente' }}
                            </x-button.primary>
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

                        @error('form.pagamento')
                            <span class="error text-xs text-red-500 uppercase">{{ $message }}</span>
                        @enderror
                    </label>

                    <label>
                        <p class="text-sm font-semibold uppercase text-gray-100">Observação</p>
                        <textarea placeholder="insira a observação aqui" wire:model="form.observacao"
                            class="w-full p-3 pl-2 uppercase text-xs text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                            id="" rows="3"></textarea>

                        @error('form.observacao')
                            <span class="error text-xs text-red-500 uppercase">{{ $message }}</span>
                        @enderror
                    </label>

                    <div class="flex justify-center">
                        <x-button.success type="submit">
                            Salvar
                        </x-button.success>
                    </div>
                </form>
            </div>
        @endslot
    </x-modal.modal-medium>

    <x-modal.modal-small title="clientes" name="clientes">
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
                <div class="flex justify-center items-start flex-wrap m-3 overflow-auto h-auto max-h-60">
                    @foreach ($pessoas as $pessoa)
                        <div wire:click="selecionarCliente({{ $pessoa->id }})"
                            class="m-2 p-2 text-sm font-semibold uppercase text-gray-700 shadow border rounded w-48 transition-all hover:bg-gray-100 hover:shadow-xl hover:scale-105 cursor-pointer dark:text-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:border-gray-700">

                            <div class="flex justify-between items-center mb-1">
                                <h1 class="">#{{ $pessoa->id }}</h1>
                                

                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748ZM12.1779 7.17624C11.4834 7.48982 11 8.18846 11 9C11 10.1046 11.8954 11 13 11C13.8115 11 14.5102 10.5166 14.8238 9.82212C14.9383 10.1945 15 10.59 15 11C15 13.2091 13.2091 15 11 15C8.79086 15 7 13.2091 7 11C7 8.79086 8.79086 7 11 7C11.41 7 11.8055 7.06167 12.1779 7.17624Z">
                                    </path>
                                </svg>
                            </div>
                            <h1 class="text-sm my-2">
                                {{ $pessoa->name }}
                            </h1>

                            <h1 class="text-xs text-gray-400">tel: {{ $pessoa->phone }}</h1>
                        </div>
                    @endforeach
                </div>
            @endif
        @endslot
    </x-modal.modal-small>
</div>
