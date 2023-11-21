@extends('app.layouts.app')

@section('title', 'Criar Pedido')

@section('content')

<main class="container">
    @livewire('Pedidos.PedidosItens')
</main>

@endsection