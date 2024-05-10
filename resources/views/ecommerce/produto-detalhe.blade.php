@extends('layouts.ecommerce-main')

@section('content')
    <div class="mt-40">
       {{-- <h1>detalhe do produto</h1> --}}
       @livewire('Ecommerce.Produtos.ProdutoDetalhe', ['codigo' => $codigo])
    </div>
@endsection
