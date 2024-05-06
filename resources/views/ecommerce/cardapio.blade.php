@extends('layouts.ecommerce-main')

@section('content')
    <div class="flex flex-col items-start gap-5 my-56 mx-7 md:flex-row">

        <div class="w-full rounded-md shadow-md border bg-white md:w-1/5">
            <h4 class="mb-4 text-md uppercase ml-6 text-gray-600 font-semibold tracking-widest">
                Categorias
            </h4>
        </div>


        <div class="w-full md:w-4/5">
            @livewire('Ecommerce.Produtos.ListaProdutos')
        </div>

    </div>

@endsection
