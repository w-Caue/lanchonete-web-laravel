<?php

namespace App\Livewire\Ecommerce\Produtos;

use App\Models\Combo;
use App\Models\Encarte;
use App\Models\Produto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ListaProdutos extends Component
{
    use WithPagination;

    use LivewireAlert;

    public $readyLoad = false;

    public $produtoDetalhe;

    public $carrinho = [];
    public $quantidade = 1;

    public function load()
    {
        $this->readyLoad = true;
    }

    public function mount()
    {
        $this->carrinho = session()->get('carrinho');
    }

    public function dados()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.tamanho',
            'produtos.categoria_id',
            'produtos.preco',
            'produtos.tipo_ecommerce',
            'produtos.promocao',
            'produtos.valor_promocao',
        ])->where('tipo_ecommerce', 'S'); #Filtros
        // ->when($this->pesquisa, function ($query) {
        //     $filter = strtolower($this->sortField);
        //     return $query->where($filter, 'like', "%" . $this->pesquisa . "%");
        // });

        return $produtos->paginate(15);
    }

    public function produto($codigo)
    {
        $this->produtoDetalhe = Produto::where('id', $codigo)->get()->first();
    }

    public function add()
    {
        $this->quantidade++;
    }

    public function remover()
    {
        $this->quantidade--;

        if ($this->quantidade == 0) {
            $this->quantidade = 1;

            return;
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos.lista-produtos', [
            'produtos' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}
