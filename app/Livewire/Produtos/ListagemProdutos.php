<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemProdutos extends Component
{
    use WithPagination;

    public function dados(){
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca_id',
            'produtos.preco',
            'produtos.tipo_ecommerce',
        ]);

        return $produtos->paginate(5);
    }

    public function render()
    {
        return view('livewire.produtos.listagem-produtos', [
            'produtos' => $this->dados(),
        ]);
    }
}
