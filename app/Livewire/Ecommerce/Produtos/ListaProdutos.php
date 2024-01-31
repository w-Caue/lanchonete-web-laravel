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
    public $quantidade = 1;

    public function load()
    {
        $this->readyLoad = true;
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

    public function adicionarItem($codigo, $nome, $descricao, $preco)
    {
        $novo = true;

        if (is_array($this->carrinho) || is_object($this->carrinho)) {
            foreach ($this->carrinho as $index => $item) {
                if ($codigo == $item['codigo']) {
                    //Produto já está no carrinho, só somar a quantidade
                    $this->carrinho[$index]['quantidade'] += $this->quantidade;
                    $this->carrinho[$index]['codigo'] = $codigo;
                    $this->carrinho[$index]['preco'] = $preco;
                    $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                    $this->carrinho[$index]['descricao'] = $descricao;
                    

                    $novo = false;
                }
            }
        }

        if ($novo) {
            $novoItem = array(
                'codigo' => $codigo,
                'nome' => $nome,
                'descricao' => $descricao,
                'quantidade' => $this->quantidade,
                'preco' => $preco,
                'total' => $preco * $this->quantidade,
            );
            array_push($this->carrinho, $novoItem);
        }

        session()->put('carrinho', $this->carrinho);

        if ($novo) {
            $this->alert('success', 'Item Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => false,
            ]);

            $this->dispatch('close-detalhe');

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