@extends('layouts.ecommerce')

@section('content')
    <div class="py-1 text-center mt-16">
        <h1 class="text-4xl tracking-wider font-semibold">Carrinho</h1>

        <div class="flex justify-center m-1">
            <div class="flex flex-row content-center justify-center p-4">

                <!--Carrinho -->
                <div class="border-4 border-purple-700 rounded-full p-1">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-700 rounded-full focus:shadow-outline-blue"
                        aria-label="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                            <path
                                d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                    </button>
                </div>
                <!--/Carrinho -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->


                @if (auth()->check())
                    <!-- User -->
                    <div class="border-4 border-purple-700 bg-purple-700 rounded-full p-1">
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white bg-purple-700 transition-colors duration-150 rounded-full"
                            aria-label="Edit">
                            <svg class="w-8 h-8" stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <!--/User -->
                @else
                    <!-- User -->
                    <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
                            aria-label="Edit">
                            <svg class="w-8 h-8" stroke-width="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <!--/User -->
                @endif

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Entrega -->
                <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M18.364 17.364L12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364ZM12 15C14.2091 15 16 13.2091 16 11C16 8.79086 14.2091 7 12 7C9.79086 7 8 8.79086 8 11C8 13.2091 9.79086 15 12 15ZM12 13C10.8954 13 10 12.1046 10 11C10 9.89543 10.8954 9 12 9C13.1046 9 14 9.89543 14 11C14 12.1046 13.1046 13 12 13Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <!--/Entrega -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Pagamento -->
                <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
                        aria-label="Edit">
                        <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path
                                d="M22.0049 9.99979V19.9998C22.0049 20.5521 21.5572 20.9998 21.0049 20.9998H3.00488C2.4526 20.9998 2.00488 20.5521 2.00488 19.9998V9.99979H22.0049ZM22.0049 7.99979H2.00488V3.99979C2.00488 3.4475 2.4526 2.99979 3.00488 2.99979H21.0049C21.5572 2.99979 22.0049 3.4475 22.0049 3.99979V7.99979ZM15.0049 15.9998V17.9998H19.0049V15.9998H15.0049Z">
                            </path>
                        </svg>
                    </button>
                </div>
                <!--/Pagamento -->

                <!--Arrow -->
                <button
                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-300 transition-colors duration-150"
                    aria-label="Edit">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 12H5m14 0-4 4m4-4-4-4" />
                    </svg>
                </button>
                <!--/Arrow -->

                <!-- Checkout -->
                <div class="border-4 border-gray-400 rounded-full p-1 opacity-35">
                    <button
                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5  transition-colors duration-150 rounded-full"
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
    @livewire('Ecommerce.Pedidos.Pedido')
@endsection
