@extends('layouts.nav')


@section('content')
    <section>
        <h1 class="text-center font-bold text-2xl text-gray-500">Graficos</h1>
    </section>
    <hr>

    @can('painel')
        <section class="flex justify-center gap-3 flex-wrap m-6">
            <a href="{{ route('painel.clientes') }}"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-96 hover:bg-gray-100">
                <div class="flex justify-center text-gray-600 bg-gray-200 p-4 rounded-full m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-11 h-11">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                    </svg>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Clientes</h5>
                    <p class="mb-3 font-semibold text-gray-700 dark:text-gray-400">Veja os clientes que frequentam a sua loja
                    </p>
                </div>
            </a>

            <a href="{{ route('painel.itens') }}"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                <div class="flex justify-center text-gray-600 bg-gray-200 p-4 rounded-full m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-11 h-11">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
                    </svg>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Itens</h5>
                    <p class="mb-3 font-semibold text-gray-700 dark:text-gray-400">Cadastre ou edite algum item</p>
                </div>
            </a>

            <a href="{{ route('painel.pedidos') }}"
                class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100">
                <div class="flex justify-center text-gray-600 bg-gray-200 p-4 rounded-full m-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-11 h-11">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                </div>
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Pedidos</h5>
                    <p class="mb-3 font-semibold text-gray-700 dark:text-gray-400">Veja os pedidos dos clientes do site</p>
                </div>
            </a>
        </section>
    @endcan
@endsection
