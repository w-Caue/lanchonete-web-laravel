<?php

namespace App\Livewire\Pedidos;

use App\Models\FormaDePagamento;
use App\Models\FormaPagamento;
use App\Models\Pedido;
use App\Models\PedidoItem as ModelsPedidoItem;
use App\Models\Produto;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class PedidoItem extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $pedido;

    public $produtoDetalhe;

    public $quantidade = 1;
    public $total;
    public $totalPedido;
    public $totalItens;

    public $produto;

    public $pagamentos = [];

    public $pagamento;
    public $descricao;

    protected $listeners = [
        'deleteProduto'
    ];

    public function mount($codigo)
    {
        $this->pedido = Pedido::where('id', '=', $codigo)->get()->first();

        $this->parametros();
    }

    public function produtos()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.preco',
        ]);

        return $produtos->paginate(4);
    }

    public function adicionarProduto($codigo)
    {
        $novo = true;

        $produto = Produto::where('id', $codigo)->get()->first();

        $pedidoItem = ModelsPedidoItem::where('pedido_id', $this->pedido->id)->where('produto_id', $produto->id)->get();

        foreach ($pedidoItem as $index => $item) {

            if ($produto->id == $item->produto_id) {

                $this->quantidade += $item->quantidade;

                ModelsPedidoItem::findOrFail($pedidoItem[$index]['id'])->update([
                    'quantidade' => $this->quantidade,
                    'total' => $this->quantidade * $produto->preco
                ]);
            }

            $this->alert('success', 'Item Adicionado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => true,
            ]);

            $novo = false;
        }

        if ($novo) {
            ModelsPedidoItem::create([
                'pedido_id' => $this->pedido->id,
                'produto_id' => $produto->id,
                'quantidade' => $this->quantidade,
                'total' => $this->quantidade * $produto->preco
            ]);

            $this->alert('success', 'Item Adicionado!', [
                'position' => 'center',
                'timer' => '1000',
                'toast' => false,
            ]);
        }

        $this->quantidade = 1;
        $this->atualizarTotais();
    }

    public function removerProduto($codigo)
    {
        $produto = Produto::where('id', $codigo)->get()->first();

        $pedidoItem = ModelsPedidoItem::where('pedido_id', $this->pedido->id)->where('produto_id', $produto->id)->get();

        foreach ($pedidoItem as $index => $item) {

            if ($produto->id == $item->produto_id) {

                $this->quantidade = $item->quantidade - 1;

                if ($this->quantidade < 1) {
                    // $this->quantidade = 0;
                    ModelsPedidoItem::where('pedido_id', $this->pedido->id)
                        ->where('produto_id', $item->produto_id)->delete();

                    return $this->alert('success', 'Item Removido!', [
                        'position' => 'center',
                        'timer' => '1000',
                        'toast' => true,
                    ]);
                }

                ModelsPedidoItem::findOrFail($pedidoItem[$index]['id'])->update([
                    'quantidade' => $this->quantidade,
                    'total' => $this->quantidade * $produto->preco
                ]);
            }
        }

        $this->quantidade = 1;

        $this->atualizarTotais();
    }

    public function excluirProduto(Produto $produto)
    {
        $this->produto = $produto;

        $this->alert('info', 'Remover Esse Item do Pedido?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'deleteProduto',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function deleteProduto()
    {
        ModelsPedidoItem::where('pedido_id', $this->pedido->id)
            ->where('produto_id', $this->produto->id)->delete();

        $this->atualizarTotais();

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function atualizarTotais()
    {
        $total = 0;
        foreach ($this->pedido->itens as $key => $value) {
            $total += $value['pivot']['total'];
        }
        $this->totalPedido = $total;
        $this->totalItens = $total;

        Pedido::findOrFail($this->pedido->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->totalItens
        ]);
    }

    public function finalizarPedido()
    {
        Pedido::findOrFail($this->pedido->id)->update([
            'forma_pagamento_id' => $this->pagamento,
            'descricao' => $this->descricao,
            'status' => 'Finalizado'
        ]);

        $this->alert('success', 'Pedido Finalizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

        $this->js('window.location.reload()');
    }

    public function parametros()
    {
        $this->pagamentos = FormaPagamento::all();
        $this->pagamento = $this->pedido->forma_de_pagamento_id;
        $this->descricao = $this->pedido->descricao;
    }

    public function render()
    {
        return view('livewire.pedidos.pedido-item', [
            'produtos' => $this->produtos(),
        ]);
    }
}
