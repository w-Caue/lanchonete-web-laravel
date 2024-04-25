@extends('layouts.ecommerce-main')

@section('content')
    <div class="flex flex-col items-start gap-5 my-10 mx-7 md:flex-row">

        <div class="w-full px-10 py-5 rounded-md shadow-md md:w-2/3">
            <h4 class="mb-4 text-lg font-semibold tracking-widest">
                Categorias
            </h4>
        </div>


        <div class="w-full h-auto px-8 py-10 rounded-md shadow-md bg-white md:w-2/3">
            @livewire('Ecommerce.Produtos.ListaProdutos')
        </div>

    </div>

    {{-- <div class="flex flex-row mt-8 body-font">
        <div class="flex flex-row lg:block">

            

            <div class="px-5 mx-auto">
                <div class="flex items-center justify-between w-full mb-6 text-center md:flex-row">
                    <div class="block sm:hidden">
                        <button class="flex gap-1" x-on:click="filter.open = !filter.open">

                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M5 7C5 6.17157 5.67157 5.5 6.5 5.5C7.32843 5.5 8 6.17157 8 7C8 7.82843 7.32843 8.5 6.5 8.5C5.67157 8.5 5 7.82843 5 7ZM6.5 3.5C4.567 3.5 3 5.067 3 7C3 8.933 4.567 10.5 6.5 10.5C8.433 10.5 10 8.933 10 7C10 5.067 8.433 3.5 6.5 3.5ZM12 8H20V6H12V8ZM16 17C16 16.1716 16.6716 15.5 17.5 15.5C18.3284 15.5 19 16.1716 19 17C19 17.8284 18.3284 18.5 17.5 18.5C16.6716 18.5 16 17.8284 16 17ZM17.5 13.5C15.567 13.5 14 15.067 14 17C14 18.933 15.567 20.5 17.5 20.5C19.433 20.5 21 18.933 21 17C21 15.067 19.433 13.5 17.5 13.5ZM4 16V18H12V16H4Z">
                                </path>
                            </svg>

                            <span class="text-sm font-semibold tracking-widest">filtrar</span>
                        </button>
                    </div>

                    <div class="">
                        <div class="flex flex-row items-center">
                            <h1 class="text-sm font-semibold tracking-widest">ordenar por:</h1>
                            <select wire:model="sortField"
                                class="rounded-lg form-control border p-1 text-sm font-semibold tracking-widest">
                                <option class="text-sm font-sembold tracking-widest" value="ENCARTE_ITENS.ORDEM_APRES">
                                    Padrão
                                </option>
                                <option class="text-sm font-sembold tracking-widest" value="PRODUTOS.DESCRICAO">Alfabética
                                </option>
                                <option class="text-sm font-sembold tracking-widest" value="VL_PROMOCAO">Preço</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="container">
                    
                    @livewire('Ecommerce.Produtos.ListaProdutos')

                </div>
            </div>
        </div>
    </div> --}}
@endsection
