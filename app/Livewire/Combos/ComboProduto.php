<?php

namespace App\Livewire\Combos;

use App\Models\Combo;
use App\Models\ComboProduto as ModelsComboProduto;
use App\Models\Produto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ComboProduto extends Component
{
    use WithPagination;

    use LivewireAlert;

    public $combo;

    public $produtos;
    public $produtoDetalhe;

    public $totalProdutos;
    public $countProdutos;

    public $descricao;
    public $desconto;

    public function mount($codigo)
    {
        $this->combo = Combo::where('id', $codigo)->get()->first();

        $this->countProdutos = $this->combo->id;

        $this->atualizaValores();
    }

    public function pesquisaProdutos()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.preco',
        ]);

        return $this->produtos = $produtos->get();
    }

    public function produtoCombo(Produto $produto)
    {
        $this->produtoDetalhe = $produto;
    }

    public function adicionarProduto()
    {
        ModelsComboProduto::create([
            'combo_id' => $this->combo->id,
            'produto_id' => $this->produtoDetalhe->id,
            'valor_produto' => $this->produtoDetalhe->preco,
        ]);

        $this->dispatch('close-detalhe');
    }

    public function ativar()
    {
        Combo::find($this->combo->id)->update([
            'descricao' => $this->descricao,
            'desconto' => $this->desconto,
            'valor_total' => $this->totalProdutos,
            'ativo' => 'S',
        ]);
    }

    public function atualizaValores()
    {
        $total = 0;
        foreach ($this->combo->produtos as $produto) {
            $total += $produto->preco;
        }
        $this->totalProdutos = $total;
    }

    public function render()
    {
        return view('livewire.combos.combo-produto');
    }
}
