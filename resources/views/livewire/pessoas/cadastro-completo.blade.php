<div x-cloak x-data="{ show: 'cadastro' }">
    <div class="flex gap-2">
        <button :class="{ 'active font-bold text-white bg-white dark:bg-gray-800': show === 'cadastro' }"
            class="py-2 px-4 text-sm uppercase font-semibold text-gray-600 border border-b-0 rounded-t hover:text-white dark:border-gray-800"
            x-on:click="show = 'cadastro'">
            Cadastro
        </button>

        <button :class="{ 'active font-bold text-white bg-white dark:bg-gray-800': show === 'informacoes' }"
            class="py-2 px-4 text-sm uppercase font-semibold text-gray-600 border border-b-0 rounded-t hover:text-white dark:border-gray-800"
            x-on:click="show = 'informacoes'">
            Outras Info.
        </button>
    </div>
    <div class="grid grid-cols-5 items-start gap-2">

        <div class="w-full col-span-3">
            <div class="px-4 py-3 mb-8 bg-white rounded-b-lg rounded-tr-lg shadow-md dark:bg-gray-800">

                <div class="flex justify-between items-center my-2 text-sm">
                    <div class=" mt-2">
                        <label for="">
                            <p class="text-sm font-semibold uppercase text-gray-100">Codigo</p>
                            <input wire:model="form.codigo"
                                class="p-1 pl-2 w-10 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white"
                                type="text">
                        </label>
                    </div>

                    <div class="mt-2 mx-10 text-md uppercase font-semibold leading-tight">
                        @if ($form->status == 'Ativo')
                            <span
                                class="px-2 py-1  text-green-700 bg-green-100 rounded-full dark:bg-blue-100 dark:text-blue-500">
                                {{ $form->status }}
                            </span>
                        @else
                            <span
                                class="px-2 py-1  text-red-700 bg-green-100 rounded-full dark:bg-red-200 dark:text-red-500">
                                {{ $form->status }}
                            </span>
                        @endif
                    </div>
                </div>

                <label class="my-2">
                    <p class="text-sm font-semibold uppercase text-gray-100">Nome</p>
                    <x-input wire:model="form.name" class="w-full"></x-input>
                </label>

                <label class="my-2">
                    <p class="text-sm font-semibold uppercase text-gray-100">E-mail</p>
                    <x-input wire:model="form.email" class="w-full"></x-input>
                </label>

                <div class="flex gap-3 my-2">
                    <label class="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Telefone</p>
                        <x-input wire:model="form.phone" class="w-40" type="tel"></x-input>
                    </label>

                    <label class="">
                        <p class="text-sm font-semibold uppercase text-gray-100">Data do Cadastro</p>
                        <x-input wire:model="form.dataCad" class="w-40" type="date"></x-input>
                    </label>
                </div>

                <div class="py-4 flex gap-3">
                    <x-button.primary type="button" wire:click="edit()">Salvar</x-button.primary>
                    <x-button.danger>Deletar</x-button.danger>
                </div>
            </div>
        </div>

        <div class="w-full col-span-2">
            {{-- @livewire('Ecommerce.Conta.Cadastro') --}}
        </div>
    </div>
</div>
