<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;

class PedidoItem extends Component
{
    public $pedido;

    public function mount($codigo){
        $this->pedido = Pedido::where('id', '=', $codigo)->get()->first();
    }

    public function render()
    {
        return view('livewire.pedidos.pedido-item');
    }
}
