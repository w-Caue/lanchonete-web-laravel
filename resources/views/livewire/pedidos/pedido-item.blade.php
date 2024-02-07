<div>
    <div class="text-sm font-semibold p-2 bg-gray-800 rounded">
        <div class="my-1 flex justify-between">
            <h1 class="text-blue-500">#{{$pedido->id}}</h1>
            <h1 class="text-gray-500">{{date('d/m/Y', strtotime($pedido->created_at))}}</h1>
        </div>
        <label class="my-1">
            <h1 class="text-gray-200">Cliente: {{$pedido->pessoa->nome}}</h1>
        </label>
        <label class="my-1">
            <h1 class="text-gray-400">Descrição: {{$pedido->descricao}}</h1>
        </label>
        <label class="my-1">
            <h1 class="text-white bg-gray-700 rounded w-24 text-center"> {{$pedido->formaPagamento->nome}}</h1>
        </label>
    </div>
</div>
