<?php

namespace App\Livewire\Ecommerce\Produtos;

use App\Models\Produto;
use Livewire\Component;

class ProdutoDetalhe extends Component
{
    public $produto;

    public $observacao;

    public $quantidade = 1;
    public $total;

    public function mount($codigo)
    {
        $this->produto($codigo);
    }

    public function produto($codigo)
    {
        $this->produto = Produto::where('id', $codigo)->get()->first();

        if ($this->produto->promocao == 'S') {
            $this->total = $this->produto->valor_promocao;
        } else {
            $this->total = $this->produto->preco;
        }
    }

    public function add()
    {
        $this->quantidade++;

        if ($this->produto->promocao == 'S') {
            $this->total += $this->produto->valor_promocao;
        } else {
            $this->total += $this->produto->preco;
        }
    }

    public function remover()
    {
        $this->quantidade--;

        if($this->quantidade == 0){
            $this->quantidade = 1;
            
            return;
        }

        if ($this->produto->promocao == 'S') {
            $this->total -= $this->produto->valor_promocao;
        } else {
            $this->total -= $this->produto->preco;
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos.produto-detalhe');
    }
}
