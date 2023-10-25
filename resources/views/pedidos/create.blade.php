@extends('layouts.nav')

@section('title', 'Pedidoo')
@section('nav', 'Dashboard')

@section('content')

  @livewire('Pedidos.CreatePedido')

@endsection