<div>
    <div class="flex flex-col justify-center my-10 mx-7 md:flex-row">
        <div class="w-full px-10 py-10 rounded-lg shadow-lg bg-white md:w-1/2">
            <div class="flex justify-between pb-8 border-b">
                <h1 class="text-2xl font-semibold">Informações do Pedido</h1>
                <h2 class="text-2xl font-semibold">Finalizado</h2>
            </div>

            <div class="text-gray-700 text-sm font-bold uppercase">
                <div class="flex justify-between py-4">
                    <span>Seu nome: </span>
                    <span>{{ $pedido->cliente->nome }}</span>
                </div>
                <div class="flex justify-between py-4 border-b">
                    <span>Whatsapp: </span>
                    <span>{{ $pedido->cliente->whatsapp }}</span>
                </div>
                <div class="flex justify-between py-4">
                    <span>Endereço: </span>
                    <span>{{ $pedido->endereco->endereco }}, {{ $pedido->endereco->numero }}</span>
                </div>
                <div class="flex justify-between py-4 border-b">
                    <span>Bairro: </span>
                    <span>{{ $pedido->endereco->bairro }}, {{ $pedido->endereco->cidade }}</span>
                </div>
                <div class="flex justify-between py-4">
                    <span>Forma de Pagamento: </span>
                    <span>Dinheiro</span>
                </div>
            </div>
        </div>
        <div id="summary" class="w-full px-8 py-10 rounded-r bg-gray-100 dark:bg-gray-800 md:w-1/4">
            <div class="mt-8 border-t">
                <div class="flex justify-between py-6 text-sm font-bold uppercase dark:text-white">
                    <span>Total do Pedido: </span>
                    <span>R${{ number_format($pedido->total_pedido, 2, ',', '.') }}</span>
                </div>
                <div class="flex justify-between py-6 text-sm font-bold uppercase dark:text-white">
                    <span>Seu pedido esta sendo: </span>
                    <span>{{ $pedido->status }}</span>
                </div>
                <button
                    class="flex justify-center items-center w-full py-3 text-sm font-semibold text-center text-white uppercase hover:opacity-75">
                    Pedido Finalizado
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                    </svg>
                </button>

                {{-- <a
                    class="flex justify-center w-full py-3 mt-4 text-sm font-semibold text-center text-blue-500 uppercase border border-blue-500 bg-white-500">
                    Voltar à loja
                </a> --}}
            </div>
        </div>
    </div>
</div>
