<div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        <div class="flex justify-between my-2 text-sm">
            <div class=" mt-2">
                <label for="">
                    <p class="text-sm font-semibold uppercase text-gray-100">Codigo</p>
                    <input wire:model="form.codigo" class="p-1 pl-2 w-20 text-sm text-gray-600 font-semibold rounded shadow-sm bg-white dark:bg-gray-700 dark:text-white" type="text">
                </label>
            </div>

            <div class=" mt-2">
                <p class="text-sm font-semibold uppercase text-gray-100">
                    status
                </p>

                <label class="inline-flex items-center text-xs font-semibold uppercase text-gray-100">
                    <input wire:model="form.status" type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                        name="accountType" value="Ativo" />
                    <span class="ml-2">Ativo</span>
                </label>
                <label class="inline-flex items-center ml-6 text-xs font-semibold uppercase text-gray-100">
                    <input wire:model="form.status" type="radio"
                        class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple"
                        name="accountType" value="Excluido" />
                    <span class="ml-2">Excluido</span>
                </label>
            </div>
        </div>

        <label class="my-2">
            <p class="text-sm font-semibold uppercase text-gray-100">Nome</p>
            <x-input wire:model="form.nome" class="w-full"></x-input>
        </label>

        <label class="my-2">
            <p class="text-sm font-semibold uppercase text-gray-100">E-mail</p>
            <x-input wire:model="form.email" class="w-full"></x-input>
        </label>

        <div class="flex gap-3 my-2">
            <label class="">
                <p class="text-sm font-semibold uppercase text-gray-100">whatsapp</p>
                <x-input wire:model="form.whatsapp" class="w-56" type="tel"></x-input>
            </label>

            <label class="">
                <p class="text-sm font-semibold uppercase text-gray-100">Data do Cadastro</p>
                <x-input wire:model="form.dataCad" class="w-40" type="date"></x-input>
            </label>
        </div>
        

    </div>
</div>
