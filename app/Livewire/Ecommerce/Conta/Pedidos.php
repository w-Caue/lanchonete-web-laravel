<?php

namespace App\Livewire\Ecommerce\Conta;

use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pedidos extends Component
{

    public function data()
    {
        $pedidos = Pedido::where('user_id', Auth::user()->id)->get();

        return $pedidos;
    }

    public function render()
    {
        return view('livewire.ecommerce.conta.pedidos', [
            'pedidos' => $this->data(),
        ]);
    }
}
