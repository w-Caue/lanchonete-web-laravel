<?php

namespace App\Livewire\Ecommerce\Produtos;

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
    public $quantidade = 0;

    public function load()
    {
        $this->readyLoad = true;
    }

    public function mount(){
        $this->carrinho = session()->get('carrinho');
        // dd($this->carrinho);
        $this->atualizar();
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
        ]); #Filtros
        // ->when($this->pesquisa, function ($query) {
        //     $filter = strtolower($this->sortField);
        //     return $query->where($filter, 'like', "%" . $this->pesquisa . "%");
        // });

        return $produtos->paginate(5);
    }

    public function produto($codigo)
    {
        $this->produtoDetalhe = Produto::where('id', $codigo)->get()->first();
        $this->dispatch('open-detalhe');
    }

    public function adicionarItem($codigo, $nome, $descricao, $quantidade, $preco)
    {
        $novo = true;

        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {
                //Produto já está no carrinho, só somar a quantidade
                $this->carrinho[$index]['quantidade'] += $quantidade;
                $this->carrinho[$index]['codigo'] = $codigo;
                $this->carrinho[$index]['preco'] = $preco;
                $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                $this->carrinho[$index]['descricao'] = $descricao;

                // dd($this->carrinho[$index]);
                $novo = false;
                $this->quantidade = $this->carrinho[$index]['quantidade'];
            }
        }

        if ($novo) {
            $novoItem = array(
                'codigo' => $codigo,
                'nome' => $nome,
                'descricao' => $descricao,
                'quantidade' => $quantidade,
                'preco' => $preco,
                'total' => $preco * $quantidade,
            );
           
            $this->quantidade = $quantidade;
            array_push($this->carrinho, $novoItem);
        }

        session()->put('carrinho', $this->carrinho);

        if ($codigo) {
            $this->alert('success', 'Item Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);

            $this->dispatch('close-detalhe');

            return;
        }
    }

    public function atualizar()
    {
        if ($this->carrinho == null)
            $this->carrinho = array();

        // if ($this->carrinho != null)
        //     $this->totalItens = sizeof($this->carrinho);
        // else
        //     $this->totalItens = 0;
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos.lista-produtos', [
            'produtos' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}
