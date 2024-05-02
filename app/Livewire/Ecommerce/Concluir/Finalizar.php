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
    public $cliente;
    public $carrinho;
    public $localizacao;
    public $pagamento;

    public $valorTotal;

    public $pedido;
    public $pedidoEcommerce;

    public function mount()
    {
    }

    public function informacoes()
    {
        session()->remove('carrinho');
        session()->remove('entrega');
        session()->remove('pagamento');
    }

    public function render()
    {
        return view('livewire.ecommerce.concluir.finalizar');
    }
}
