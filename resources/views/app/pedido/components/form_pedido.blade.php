
<div class="d-flex justify-content-center ">

        @if (isset($pedido))
            <form action="{{ route('painel.pedido.update', ['pedido' => $pedido->id])}}" method="post" enctype="multipart/form-data">
                @csrf  
                @method('PUT')
        @else
            <form action="{{ route('painel.pedido.store')}}" method="post" enctype="multipart/form-data">
                @csrf
        @endif
        
        <div class="mb-5">
            <select name="cliente_id" class="form-select" aria-label="Default select example" style="max-width: 200px">
            <option> Selecione o Cliente </option>
    
            @foreach ($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ ($pedido->cliente_id ?? old('cliente_id ')) == $cliente->id ? 'selected' : ''}}>{{ $cliente->nome }}</option>
            @endforeach
            
            </select>
            @error('cliente_id') <p>{{$message}}</p> @enderror
        </div>
        
        <div class="mb-5">
            <select name="forma_pagamento_id" class="form-select" aria-label="Default select example" style="max-width: 200px">
            <option> Selecione a Forma de Pagamento </option>
    
            @foreach ($formasDePagamentos as $formaDePagamento)
                <option value="{{ $formaDePagamento->id }}" {{ ($pedido->forma_de_pagamento_id ?? old('formaDePagamento->id ')) == $formaDePagamento->id ? 'selected' : ''}}>{{ $formaDePagamento->nome }}</option>
            @endforeach
            
            </select>
            @error('forma_pagamento_id') <p>{{$message}}</p> @enderror
        </div>
        

        <input type="hidden" name="status" value="aberto">

            <div class="d-flex justify-content-center">
                <button class="btn btn-primary">Criar</button>
            </div>
        </form>
    </div>


