<?php

namespace App\Livewire\Produtos;

use App\Models\Categoria;
use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemProdutos extends Component
{
    use WithPagination;

    public $search;

    public $sortFilter = false;

    public function mount()
    {
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
        ]) #Filtros
            ->when($this->search, function ($query) {
                return $query->where('nome', 'LIKE', "%" . $this->search . "%");
            });

        return $produtos->paginate(5);
    }

    public function render()
    {
        return view('livewire.produtos.listagem-produtos', [
            'produtos' => $this->dados(),
        ]);
    }
}
