<?php

namespace App\Livewire\Ecommerce\Pagamento;

use Livewire\Component;

class Pagamento extends Component
{

    public $carrinho;
    public $valorProdutos;

    public $pagamento = false;

    public function mount()
    {
        $this->pagamento = session()->get('pagamento');

        $this->carrinho();
    }

    public function carrinho()
    {
        $this->carrinho = session()->get('carrinho');

        $this->valorProdutos = 0;
        foreach ($this->carrinho as $index => $item) {
            $this->valorProdutos += $this->carrinho[$index]['total'];
        }
    }

    public function formaPagamento(){
        session()->put('pagamento', $this->pagamento);
    }

    public function render()
    {
        return view('livewire.ecommerce.pagamento.pagamento');
    }
}
