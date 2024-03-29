<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemProdutos extends Component
{
    use WithPagination;

    public $categorias;

    public function mount()
    {
        // $this->parametros();
    }

    public function dados()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca_id',
            'produtos.categoria_id',
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
