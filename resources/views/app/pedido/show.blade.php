@extends('app.layouts.app')

@section('title', 'Pedido')
@section('nav', 'Dashboard')

@section('content')



<div class="container-fluid mb-5">
  <h1 class="text-center">Detalhe do Pedido</h1>
</div>

<div class="row float-end me-3">
    <a href="{{ route('painel.pedido-item.create', ['pedido' => $pedido->id]) }}" class="fs-5 nav-link">Voltar ao Cardapio</a>
</div>

<div class="container">

    <h2>Pedido de: {{$pedido->cliente->nome}}</h2>

    <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Preço</th>
            <th scope="col">Tamanho</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pedido->itens as $itens)
              <tr>
                <th scope="row">{{ $itens->id }}</th>
                <td>{{$itens->nome}}</td>
                <td>{{ number_format($itens->preco, 2, ',', '.') }}</td>
                <td>{{$itens->tamanho_id}}</td>
              </tr>
          @endforeach
          
        </tbody>
      </table>

      <div class="float-end">
        <a href="" class="btn btn-primary">Finalizar Pedido</a>
      </div>

      {{-- {{$pedidos->links('layouts.paginate')}} --}}
</div>

@endsection