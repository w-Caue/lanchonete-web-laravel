@extends('layouts.ecommerce')

@section('content')
    <div class="bg-indigo-500 py-1 mx-auto text-center">
        <div class="flex justify-center m-1">
            <div class="flex flex-row content-center justify-center p-4">

                <!--Carrinho -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-400 border border-transparent rounded-full active:bg-blue-600 focus:shadow-outline-blue"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                </button>
                <!--/Carrinho -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
                <!--/Arrow -->


                <!-- User -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-400 border border-transparent rounded-full active:bg-blue-600 focus:shadow-outline-blue"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </button>
                <!--/User -->


                <!-- Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Entrega -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-400 border border-transparent rounded-full active:bg-blue-600 focus:shadow-outline-blue"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </button>
                <!--/Entrega -->

                <!-- Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Checkout -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-gray-400 border border-transparent rounded-full active:bg-blue-600 focus:shadow-outline-blue"
                    aria-label="Edit">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </button>
                <!--/Checkout -->

            </div>
        </div>
    </div>
    @livewire('Ecommerce.Pedidos.Pedido')
@endsection
