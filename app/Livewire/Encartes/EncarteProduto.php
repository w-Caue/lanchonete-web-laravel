<?php

namespace App\Livewire\Encartes;

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

    public $encarte;

    public $produtos;

    public $produtoDetalhe;

    public $valorPromocao;

    public function mount($codigo)
    {
        $this->encarte = Encarte::where('id', $codigo)->get()->first();
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
        ModelsEncarteProduto::create([
            'encarte_id' => $this->encarteDetalhe->id,
            'produto_id' => $this->produtoDetalhe->id,
        ]);

        Produto::find($this->produtoDetalhe->id)->update([
            'valor_promocao' => $this->valorPromocao
        ]);
    }

    public function render()
    {
        return view('livewire.encartes.encarte-produto');
    }
}
