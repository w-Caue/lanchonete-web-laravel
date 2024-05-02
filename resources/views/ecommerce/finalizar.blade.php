@extends('layouts.ecommerce')

@section('content')
    <div class="py-1 text-center mt-16">
        <h1 class="text-4xl tracking-wider font-semibold">Pedido Criado</h1>

        <div class="flex justify-center m-1">
            <div class="flex flex-row content-center justify-center p-4">

                <!-- Checkout -->
                <div class="border-4 border-purple-700 rounded-full p-1">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white bg-purple-700 transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </button>
                </div>
                <!--/Checkout -->

            </div>
        </div>
    </div>
    @livewire('Ecommerce.Concluir.Finalizar')
@endsection
