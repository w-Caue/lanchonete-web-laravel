@extends('layouts.app')

@section('content')
    {{-- <section>
        <h1 class="text-center font-bold text-2xl text-gray-500">Graficos</h1>
    </section>
    <hr> --}}
    <div class="flex justify-center gap-3">

        <!-- Card -->
        {{-- <a 
            class="flex items-center p-4 bg-white rounded-lg shadow-xs"
            title="Total de clientes que você tem acesso">
            <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500"
                wfd-id="99">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                    </path>
                </svg>
            </div>
            <div wfd-id="98">
                <p class="mb-2 text-sm font-medium">
                    Total clientes
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    
                </p>
            </div>
        </a>
        {{-- @endif --}}

        <!-- Card -->
        {{-- <a 
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
            title="Total de produtos que você tem acesso">
            <div class="p-3 mr-4 text-purple-500 bg-purple-100 rounded-full dark:text-purple-100 dark:bg-purple-500"
                wfd-id="96">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
            <div wfd-id="95">
                <p class="mb-2 text-sm font-medium ">
                    Produtos
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    
                </p>
            </div>
        </a> --}}
        <!-- Card -->
        {{-- <a 
            class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" title="Vendas do Mês">
            <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500" wfd-id="93">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                    </path>
                </svg>
            </div>
            <div wfd-id="92">
                <p class="mb-2 text-sm font-medium ">
                    Pedidos do mês <span class="font-thin">(Autênticados) </span>
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    
                </p>
            </div>
        </a> --}} 
        <!-- Card -->
        {{-- <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800" wfd-id="88">
            <div class="p-3 mr-4 text-blue-500 rounded-full bg-g dark:text-blue-100 dark:bg-blue-500" wfd-id="90">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <div wfd-id="89">
                <p class="mb-2 text-sm font-medium ">
                    Clientes atendidos no mês
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    35
                </p>
            </div>
        </div> --}}
    </div>
    <!--./Cards-->
@endsection
