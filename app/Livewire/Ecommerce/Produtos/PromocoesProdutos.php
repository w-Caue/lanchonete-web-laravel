<?php

namespace App\Livewire\Ecommerce\Produtos;

use App\Models\Encarte as ModelsEncarte;
use App\Models\Produto;
use Livewire\Component;

class PromocoesProdutos extends Component
{

    public $encarte;
    public $produtoDetalhe;

    public function mount(){
        $this->encarte();
    }

    public function encarte()
    {
        $this->encarte = ModelsEncarte::where('ativo', 'S')->get()->first();
    }

    public function produto($codigo)
    {
        $this->produtoDetalhe = Produto::where('id', $codigo)->get()->first();
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos.promocoes-produtos');
    }
}
