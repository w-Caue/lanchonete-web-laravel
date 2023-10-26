<div class="">
    <div class="flex flex-col w-full">

        <h1 class="text-center text-3xl">Lista De Clientes</h1>

        <div class="mb-4">
            <h4 class="text-center text-lg font-medium">Pesquisa</h4>

            <div class="flex justify-center gap-1">
                <input wire:model.lazy="search" type="text" name="seach"
                    class="appearance-none block w-full md:w-1/3 bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                    value="">
                <button class="bg-blue-500 text-white p-3 border border-blue-500 hover:border-transparent rounded">
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

            <button wire:click='novoCliente()' class="font-medium">
                Cadastrar
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
                                    {{ $cliente->name }}
                                </td>
                                <td class="px-6 py-5">
                                    {{ $cliente->email }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $cliente->telefone }}
                                </td>
                                <td class="px-6 py-4">
                                    Editar
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
            <div class="fixed top-32 bg-white w-3/4 border-2 rounded-lg">

                <div class="bg-gray-200 rounded-t-lg mb-4 flex justify-end ">
                    <button wire:click.prevent='novoCliente()' class="rounded m-2 hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h1 class="text-center text-xl font-semibold mb-5">Cadastrar Cliente</h1>

                <div class="flex justify-center">
                    <form wire:submit.prevent="save" class="w-full max-w-2xl">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Nome
                                </label>
                                <input wire:model='form.nome'
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
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
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
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
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                                    id="grid-first-name" type="number">
                            </div>

                            @error('form.telefone')
                                <span class="error">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="flex justify-center mb-4">
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Cadastrar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

</div>
