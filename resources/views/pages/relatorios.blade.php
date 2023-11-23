@extends('layouts.nav')

@section('title', 'Relatórios')

@section('content')
    <section class="flex justify-center gap-3 flex-wrap m-6">
        <a href="{{ route('painel.relatorio.relatorio-pedidos') }}"
            class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:w-96 hover:bg-gray-100">
            <div class="flex justify-center text-gray-600 bg-gray-200 p-4 rounded-full m-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-11 w-11" fill="currentColor"
                            class="bi bi-basket2-fill" viewBox="0 0 16 16">
                            <path
                                d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383L5.93 1.757zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1" />
                        </svg>
            </div>
            <div class="flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">Pedidos</h5>
                <p class="mb-3 font-semibold text-gray-700 dark:text-gray-400"></p>
            </div>
        </a>

    </section>
@endsection
