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
            'pedidos.*',
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
