<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPedidos extends Component
{
    use WithPagination;

    public function dados(){
        $pedidos = Pedido::select([
            'pedidos.id',
            'pedidos.pessoa_id',
            'pedidos.descricao',
            'pedidos.forma_de_pagamento_id',
            'pedidos.status',
            'pedidos.ecommerce',
            'pedidos.total_itens',
            'pedidos.total_pedido',
        ]);

        return $pedidos->paginate(5);
    }

    public function render()
    {
        return view('livewire.pedidos.listagem-pedidos', [
            'pedidos' => $this->dados(),
        ]);
    }
}
