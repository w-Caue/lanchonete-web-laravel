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
    public $quantidade = 0;

    public $pedidoEcommerce;

    public function load()
    {
        $this->readyLoad = true;
    }

    public function mount()
    {
        $this->carrinho = session()->get('carrinho');
        $this->pedidoEcommerce = session()->get('pedidoEcommerce');
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
            'produtos.tipo_ecommerce',
        ])->where('tipo_ecommerce', 'S'); #Filtros
        // ->when($this->pesquisa, function ($query) {
        //     $filter = strtolower($this->sortField);
        //     return $query->where($filter, 'like', "%" . $this->pesquisa . "%");
        // });

        return $produtos->paginate(5);
    }

    public function adicionarItem($codigo, $nome, $descricao, $quantidade, $preco)
    {
        if ($this->pedidoEcommerce == null) {
            $novo = true;

            foreach ($this->carrinho as $index => $item) {
                if ($codigo == $item['codigo']) {
                    //Produto já está no carrinho, só somar a quantidade
                    $this->carrinho[$index]['quantidade'] += $quantidade;
                    $this->carrinho[$index]['codigo'] = $codigo;
                    $this->carrinho[$index]['preco'] = $preco;
                    $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                    $this->carrinho[$index]['descricao'] = $descricao;

                    $novo = false;
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
        } else {
            $this->alert('info', 'Não é possivel adicionar mais itens!', [
                'position' => 'center',
                'text' => 'seu pedido já esta sendo preparado',
                'timer' => 2000,
                'toast' => false,
            ]);
        }
    }

    public function removerItem($codigo, $quantidade)
    {
        if ($this->pedidoEcommerce == null) {
            foreach ($this->carrinho as $index => $item) {
                if ($codigo == $item['codigo']) {

                    $this->carrinho[$index]['quantidade'] += $quantidade;

                    if ($this->carrinho[$index]['quantidade'] < 1) {
                        $this->carrinho[$index]['quantidade'] = 0;
                    }

                    $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                }
            }

            $this->atualizar();
        } else {
            $this->alert('info', 'Não é possivel adicionar mais itens!', [
                'position' => 'center',
                'text' => 'seu pedido já esta sendo preparado',
                'timer' => 2000,
                'toast' => false,
            ]);
        }
    }

    public function atualizar()
    {
        if ($this->carrinho == null)
            $this->carrinho = array();

        session()->put('carrinho', $this->carrinho);
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos.lista-produtos', [
            'produtos' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}
