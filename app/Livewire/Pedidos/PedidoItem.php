<?php

namespace App\Livewire\Pedidos;

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

    protected $listeners = [
        'deleteProduto'
    ];

    public function mount($codigo)
    {
        $this->pedido = Pedido::where('id', '=', $codigo)->get()->first();
    }

    public function produtos()
    {
        $produtos = Produto::select([
            'produtos.id',
            'produtos.nome',
            'produtos.descricao',
            'produtos.marca_id',
            'produtos.preco',
        ]);

        return $produtos->paginate(4);
    }

    public function produtoPedido($codigo)
    {
        $this->produtoDetalhe = Produto::where('id', $codigo)->get()->first();

        $this->dispatch('open-produto');
    }

    public function adicionarProduto()
    {
        $novo = true;

        $pedidoItem = ModelsPedidoItem::where('pedido_id', $this->pedido->id)->where('produto_id', $this->produtoDetalhe->id)->get();

        foreach ($pedidoItem as $index => $item) {

            if ($this->produtoDetalhe->id == $item->produto_id) {

                $this->quantidade += $item->quantidade;

                ModelsPedidoItem::findOrFail($pedidoItem[$index]['id'])->update([
                    'quantidade' => $this->quantidade,
                    'total' => $this->quantidade * $this->produtoDetalhe->preco
                ]);
                
                $this->totalPedido = $this->pedido->total_pedido + $pedidoItem[$index]['total'];

                $this->totalItens = $this->pedido->total_itens + $pedidoItem[$index]['total'];
            }

            $novo = false;
        }

        if ($novo) {
            ModelsPedidoItem::create([
                'pedido_id' => $this->pedido->id,
                'produto_id' => $this->produtoDetalhe->id,
                'quantidade' => $this->quantidade,
                'total' => $this->quantidade * $this->produtoDetalhe->preco
            ]);

            $this->total = $this->quantidade * $this->produtoDetalhe->preco;

            $this->totalPedido = $this->pedido->total_pedido + $this->total;

            $this->totalItens = $this->pedido->total_itens + $this->total;
        }



        $this->atualizarTotais();
    }

    // public function adicionarProduto()
    // {
    //     if ($this->produtoDetalhe->preco <= 0) {
    //         return $this->alert('warning', 'Produto sem Preço!', [
    //             'position' => 'center',
    //             'timer' => '2000',
    //             'toast' => false,
    //         ]);
    //     }

    //     $novo = true;

    //     $pedidoItem = ModelsPedidoItem::where('pedido_id', $this->pedido->id)->where('produto_id', $this->produtoDetalhe->id)->get();

    //     foreach ($pedidoItem as $index => $item) {

    //         if ($this->produtoDetalhe->id == $item->produto_id) {

    //             return $this->alert('warning', 'Produto Já Adicionado!', [
    //                 'position' => 'center',
    //                 'timer' => '2000',
    //                 'toast' => false,
    //             ]);
    //             // $this->total = $pedidoItem[$index]['quantidade'] * $this->produtoDetalhe->preco;

    //             // $this->totalPedido = $this->pedido->total_pedido + $this->total;
    //             // $this->totalItens = $this->pedido->total_itens+ $this->total;

    //             // $this->quantidade = $pedidoItem[$index]['quantidade'] +  $this->quantidade;

    //             // ModelsPedidoItem::findOrFail($pedidoItem[$index]['id'])->update([
    //             //     'quantidade' => $this->quantidade,
    //             //     'total' => $this->quantidade * $this->produtoDetalhe->preco
    //             // ]);

    //         }

    //         $novo = false;
    //     }

    //     if ($novo) {
    //         ModelsPedidoItem::create([
    //             'pedido_id' => $this->pedido->id,
    //             'produto_id' => $this->produtoDetalhe->id,
    //             'quantidade' => $this->quantidade,
    //             'total' => $this->quantidade * $this->produtoDetalhe->preco
    //         ]);

    //         $this->total = $this->quantidade * $this->produtoDetalhe->preco;

    //         $this->totalPedido = $this->pedido->total_pedido;
    //         $this->totalPedido += $this->total;
    //         $this->totalItens = $this->pedido->total_itens;
    //         $this->totalItens += $this->total;
    //     }
    //     $this->atualizarTotais();

    //     $this->dispatch('close-produto');

    //     $this->alert('success', 'Item Adicionado!', [
    //         'position' => 'center',
    //         'timer' => '1000',
    //         'toast' => false,
    //     ]);
    // }

    public function atualizarTotais()
    {
        Pedido::findOrFail($this->pedido->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->totalItens
        ]);
    }

    public function removerProduto(Produto $produto)
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
        $pedido = Pedido::where('id', $this->pedido->id)->get()->first();

        $pedidoItem = ModelsPedidoItem::where('pedido_id', $this->pedido->id)
            ->where('produto_id', $this->produto->id)->get()->first();

        $totalPedido = $pedido->total_pedido;
        $totalPedido -= $this->produto->preco * $pedidoItem->quantidade;

        $totalItens = $pedidoItem->total;
        $totalItens -= $this->produto->preco * $pedidoItem->quantidade;

        Pedido::findOrFail($this->pedido->id)->update([
            'total_pedido' => $totalPedido,
            'total_itens' => $totalItens,
        ]);

        ModelsPedidoItem::where('pedido_id', $this->pedido->id)
            ->where('produto_id', $this->produto->id)->delete();

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.pedidos.pedido-item', [
            'produtos' => $this->produtos(),
        ]);
    }
}
