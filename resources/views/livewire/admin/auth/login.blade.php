@extends('layouts.admin.app')

@section('content')
    <div class="p-6 bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col justify-center items-center overflow-y-auto md:flex-row">
            <div class="flex justify-center h-32 md:h-auto md:w-1/2">
                <img aria-hidden="true" class="object-fill rounded-md h-full" src="{{ asset('img/imagemHanbur.png') }}"
                    alt="logo" />
            </div>

            <div class="flex flex-col items-center justify-center p-6 sm:p-9">
                <div class="w-full space-y-2">
                    <h1 class="mb-4 text-xl text-center font-semibold text-gray-700 dark:text-gray-300">
                        {{ __('Área do funcionário') }}
                    </h1>

                    <div>
                        <x-inputs.label for="nome" :value="__('Usuário')" />
                        <x-inputs.text name="nome" wire:model.lazy="usuario" class="w-full" autocomplete="none" autofocus />
                    </div>

                    <div>
                        <x-inputs.label for="senha" :value="__('Senha')" />
                        <x-inputs.text label="Senha" name="senha" wire:model.lazy="senha" wire:keydown.enter="loginAdmin"
                            id="senha" class="w-full" type="password" placeholder="******" required
                            autocomplete="current-password" />
                    </div>

                </div>

                <x-button.primary wire:click='loginAdmin' class="w-full mt-4">
                    Entrar
                </x-button.primary>

            </div>
        </div>
    </div>
@endsection
