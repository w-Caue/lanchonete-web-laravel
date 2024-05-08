<?php

namespace App\Livewire\Ecommerce\Concluir;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Pessoa;
use Livewire\Component;

class Finalizar extends Component
{
    public $pedido;

    public function mount($codigo)
    {
        $this->pedido = $codigo;
    }

    public function informacoes()
    {
        session()->remove('carrinho');
        session()->remove('entrega');
        session()->remove('pagamento');
    }

    public function render()
    {
        $this->informacoes();
        
        return view('livewire.ecommerce.concluir.finalizar');
    }
}
