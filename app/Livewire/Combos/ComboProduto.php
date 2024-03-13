<?php

namespace App\Livewire\Combos;

use App\Livewire\Forms\ComboProdutoForm;
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

    public ComboProdutoForm $form;

    public $combo;

    public $produtos;
    public $produto;
    public $produtoDetalhe;

    public $totalProdutos;
    public $countProdutos;

    public $descricao;
    public $desconto;

    protected $listeners = [
        'delete'
    ];

    public function mount($codigo)
    {
        $this->form->combo($codigo);

        $this->combo = Combo::where('id', $codigo)->get()->first();

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

        $this->atualizaValores();
    }

    public function removerProduto(Produto $produto)
    {
        $this->produto = $produto;

        $this->alert('info', 'Remover esse produto do Encarte?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'delete',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function delete()
    {
        ModelsComboProduto::where('combo_id', $this->combo->id)
            ->where('produto_id', $this->produto->id)->delete();

        $this->alert('success', 'Produto removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

        $this->atualizaValores();
    }

    public function ativar()
    {
        if ($this->desconto > 0) {
            $this->totalProdutos = $this->totalProdutos - ($this->totalProdutos / 100 * $this->desconto);
        }

        Combo::find($this->combo->id)->update([
            'descricao' => $this->descricao,
            'desconto' => $this->desconto,
            'valor_total' => $this->totalProdutos,
            'ativo' => 'S',
        ]);

        $this->alert('success', 'Combo Ativo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function update()
    {
        $this->form->update();

        $this->alert('success', 'Combo Atualizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
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
