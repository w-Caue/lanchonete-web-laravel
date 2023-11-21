<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;

class AcompanharPedido extends Component
{
    public function render()
    {
        $cliente = auth()->user();
        $pedido = Pedido::where('cliente_id', $cliente->id)->get()->first();
        return view(
            'livewire.pedidos.acompanhar-pedido',
            [
                'cliente' => $cliente,
                'pedido' => $pedido,
            ]
        );
    }
}
