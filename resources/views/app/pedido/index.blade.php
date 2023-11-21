@extends('app.layouts.app')

@section('title', 'Pedidos')
@section('nav', 'Dashboard')

@section('content')


<main class="container position-relative">

  @livewire('Pedidos.Pedidos')
  
</main>


@endsection