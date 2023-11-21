<div>
    <div class="flex flex-col">
        <h1 class="text-2xl font-semibold text-center">Acompanhe Seu Pedido</h1>
        <div class="flex justify-center">
            <div class="border shadow-xl rounded-md w-1/2 h-28 m-5">

                <h1 class="text-xl font-medium text-gray-500 text-center">Seu pedido esta em {{empty($pedido->status)}}</h1>
                <h1 class="text-xl font-medium text-gray-500 text-center">{{ $cliente->name }}</h1>
                {{-- <h1 class="text-xl font-medium text-gray-500 text-center">{{ $pedido->localEntrega->endereco }}</h1> --}}

            </div>
        </div>

    </div>
</div>
