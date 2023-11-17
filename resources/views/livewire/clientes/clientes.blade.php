<div class="">
    <div class="flex flex-col w-full">

        <div class="mb-4">
            <h4 class="text-center text-lg font-medium">Pesquisa</h4>

            <div class="flex justify-center items-center gap-1">
                <input wire:model.lazy="search" type="text" name="seach"
                    class="appearance-none block w-full md:w-1/3  text-gray-700 border rounded p-3 leading-tight focus:outline-none focus:bg-white"
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
            <button wire:click='novoCliente()'
                class="flex items-center gap-1 text-lg font-semibold text-gray-700 p-2 shadow-xl border rounded">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 8h6m-3 3V5m-6-.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0ZM5 11h3a4 4 0 0 1 4 4v2H1v-2a4 4 0 0 1 4-4Z" />
                </svg>
                Novo Cliente
            </button>
            {{-- href="{{ route('painel.cliente.create') }}" --}}
        </div>

        <div class="">
            <div class="flex justify-center overflow-x-auto">
                <table class="w-5/6 text-sm text-left text-gray-500 shadow-md sm:rounded-lg">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-bold">
                                Id
                            </th>
                            <th scope="col" class="px-6 py-3 font-bold">
                                Nome
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Telefone
                            </th>
                            <th scope="col" class="px-6 py-3">

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                            <tr class="bg-white border-b">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $cliente->id }}
                                </th>
                                <td class="px-6 py-4 font-bold">
                                    {{ $cliente->nome }}
                                </td>
                                <td class="px-6 py-5">
                                    {{ $cliente->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cliente->telefone }}
                                </td>
                                <td class="px-6 py-4 flex gap-1">
                                    <button wire:click="editCliente({{ $cliente->id }})"
                                        class="flex items-center p-2 gap-1 text-white font-semibold bg-blue-400 rounded hover:bg-blue-500">
                                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="currentColor" viewBox="0 0 20 18">
                                            <path
                                                d="M6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9Zm-1.391 7.361.707-3.535a3 3 0 0 1 .82-1.533L7.929 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h4.259a2.975 2.975 0 0 1-.15-1.639ZM8.05 17.95a1 1 0 0 1-.981-1.2l.708-3.536a1 1 0 0 1 .274-.511l6.363-6.364a3.007 3.007 0 0 1 4.243 0 3.007 3.007 0 0 1 0 4.243l-6.365 6.363a1 1 0 0 1-.511.274l-3.536.708a1.07 1.07 0 0 1-.195.023Z" />
                                        </svg>

                                    </button>
                                    <button
                                        class="flex items-center p-2 gap-1 text-white font-semibold bg-red-500 rounded">
                                        Remover
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="m-4">
                {{ $clientes->links('layouts.paginate') }}
                {{-- appends($request)-> --}}
            </div>

        </div>
    </div>

    @if ($newCliente)
        <div class="flex justify-center">
            <div class="fixed top-11 bg-gray-100 w-1/2 shadow-2xl border rounded-lg">

                <div class="rounded-t-lg mb-4 flex justify-end ">
                    <button wire:click.prevent='fecharCliente()' class="rounded m-2 border hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-center text-2xl font-semibold mb-5">Cliente</h1>

                <div class="flex justify-center">
                    <form wire:submit.prevent="{{ $form->clienteId ? 'update()' : 'save()' }}" class="w-full max-w-2xl">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Nome
                                </label>
                                <input wire:model='form.nome'
                                    class="font-semibold appearance-none block w-full  text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="text">
                            </div>

                            @error('form.nome')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 md:w-3/4">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-password">
                                    Email
                                </label>
                                <input wire:model='form.email'
                                    class="font-semibold appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-password" type="text">
                            </div>

                            @error('form.email')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Telefone
                                </label>
                                <input wire:model='form.telefone'
                                    class="font-semibold appearance-none block w-full  text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="number">
                            </div>

                            @error('form.telefone')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex justify-center mb-4">
                            <button type="submit"
                                class="text-xl font-semibold p-2 border rounded bg-white hover:text-white hover:bg-blue-500">
                                {{ $form->clienteId ? 'Salvar' : 'Cadastrar' }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>
