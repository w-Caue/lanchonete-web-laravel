<?php

namespace App\Livewire\Encartes;

use App\Livewire\Forms\EncarteForm;
use App\Models\Encarte;
use App\Models\EncarteProduto as ModelsEncarteProduto;
use App\Models\Produto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class EncarteProduto extends Component
{
    use LivewireAlert;

    use WithPagination;

    public EncarteForm $form;

    public $encarte;

    public $produtos;

    public $produto;

    public $produtoDetalhe;

    public $valorPromocao;
    public $quantidadePrevista;

    public $porcetagem;
    public $valorPorcetagem;

    public $totalProdutos;
    public $totalEncarte;

    protected $listeners = [
        'delete'
    ];

    public function mount($codigo)
    {
        $this->form->exibir($codigo);

        $this->valores();
    }

    public function valores()
    {
        foreach ($this->form->encarte->produtos as $produtos) {
            $this->totalProdutos += $produtos->preco;
        }
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

    public function produtoEncarte(Produto $produto)
    {
        $this->produtoDetalhe = $produto;
    }

    public function adicionarProduto()
    {
        $porcetagem = $this->porcetagem;
        $preco = $this->produtoDetalhe->preco;

        if ($this->porcetagem != null) {
            $this->valorPromocao = $preco - ($preco / 100 * $porcetagem);
        }

        ModelsEncarteProduto::create([
            'encarte_id' => $this->form->encarte->id,
            'produto_id' => $this->produtoDetalhe->id,
            'valor_promocao' => $this->valorPromocao,
            'quantidade_prevista' => $this->quantidadePrevista,
        ]);

        $this->valores();
        $this->dispatch('close-detalhe');
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
        ModelsEncarteProduto::where('encarte_id', $this->form->encarte->id)
            ->where('produto_id', $this->produto->id)->delete();

        $this->alert('success', 'Produto removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

        $this->valores();
    }

    public function ativar()
    {
        foreach ($this->form->encarte->produtos as $produtos) {
            $this->totalEncarte += $produtos->pivot->valor_promocao;
            
            Produto::findOrFail($produtos->id)->update([
                'promocao' => 'S',
                'valor_promocao' => $produtos->pivot->valor_promocao,
            ]);
        };

        $this->form->encarte->ativo = 'S';

        if ($this->form->encarte->save()) {
            $this->alert('success', 'Encarte Ativo!', [
                'timer' => '2000',
                'toast' => true,
            ]);
        };
    }

    public function render()
    {
        return view('livewire.encartes.encarte-produto');
    }
}
