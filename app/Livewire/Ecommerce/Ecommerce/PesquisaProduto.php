<?php

namespace App\Livewire\Ecommerce\Ecommerce;

use App\Models\Produto;
use Livewire\Component;

class PesquisaProduto extends Component
{
    public $search;

    public $produtos = [];

    public function mount()
    {
        $this->search = '';
    }

    public function updatedSearch()
    {

        if ($this->search == "") {
            $this->produtos = [];
            return;
        }

        $dados = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.preco',
            'produtos.promocao',
            'produtos.valor_promocao',
        ]) #Filtros
            ->when($this->search, function ($query) {
                return $query->where('descricao', 'LIKE', "%" . $this->search . "%");
            })
            ->get()->take(5);

       $this->produtos = $dados;

    }

    public function render()
    {
        return view('livewire.ecommerce.ecommerce.pesquisa-produto');
    }
}
