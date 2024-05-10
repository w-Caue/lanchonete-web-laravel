<?php

namespace App\Livewire\Ecommerce\Produtos;

use App\Models\Encarte as ModelsEncarte;
use App\Models\Produto;
use Livewire\Component;

class PromocoesProdutos extends Component
{

    public $encarte;
    public $produtoDetalhe;
    public $observacao;

    public $quantidade = 1;

    public function mount()
    {
        $this->encarte();
    }

    public function add()
    {
        $this->quantidade++;
    }

    public function remover()
    {
        $this->quantidade--;
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
