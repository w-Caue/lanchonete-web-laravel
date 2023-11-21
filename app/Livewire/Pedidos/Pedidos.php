<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoForm;
use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\StatusPedido;
use App\Models\Tamanho;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Pedidos extends Component
{
    public PedidoForm $form;

    use LivewireAlert;

    use WithPagination;

    #Pesquisa
    public $search = '';

    #Novo Pedido
    public $newPedido = false;
    public $pedido;

    public $showPedido;
    public $pedidoCliente;

    #Item
    public $showItens = false;
    public $detalheItem;
    public $itemPedido;
    public $pedidoItem;
    public $tamanhosItens = [];

    #Cliente
    public $showCliente = false;
    public $clientePedido;
    public $clienteSelecionado;
    public $clientes;
    public $pesquisaClientes = [];
    public $cliente;

    #Item pedido
    public $quantidade = 1;
    public $total = '';

    #Autenticar Pedido
    public $showAutenticacao;
    public $totalItens;
    public $totalPedido;
    public $desconto;
    public $pedidoDesconto;
    public $statusPedido;

    protected $listeners = [
        'deleteItem'
    ];

    public function novoPedido()
    {
        $this->newPedido = !$this->newPedido;
    }

    public function mostrarPedido(Pedido $pedido)
    {
        $this->showPedido = true;
        $this->pedidoCliente = Pedido::where('id', $pedido->id)->get()->first();

        $this->form->formaPagamento = $this->pedidoCliente->forma_de_pagamento_id;
        $this->totalPedido = $this->pedidoCliente->total_pedido;
        $this->pedidoDesconto = $this->pedidoCliente->total_pedido;
        $this->statusPedido = $this->pedidoCliente->status;
        $this->totalItens = $this->pedidoCliente->total_itens;
        $this->form->descricao = $this->pedidoCliente->descricao;
    }

    public function mostrarItens()
    {
        $this->showItens = !$this->showItens;
    }

    public function fecharPedido()
    {
        $this->reset();
        $this->resetValidation();

        $this->showPedido = false;
        $this->newPedido = false;
    }

    public function fecharItens()
    {
        $this->showItens = false;
    }

    public function fecharDetalheItem()
    {
        $this->detalheItem = false;
        $this->quantidade = 1;
    }

    public function mostrarClientes()
    {
        $this->showCliente = !$this->showCliente;
    }

    public function pesquisaCliente()
    {

        $clientes = Cliente::select([
            'clientes.id',
            'clientes.nome',
            'clientes.email',
            'clientes.telefone',
        ])->where('nome', 'like', '%' . $this->clientePedido . '%');

        $this->pesquisaClientes = $clientes->orderBy('nome')->get();
    }

    public function setCliente($cliente)
    {
        $this->clientePedido = '';
        $this->clienteSelecionado = Cliente::where('id', $cliente)->get()->first();

        $this->alert('success', 'Cliente Selecionado', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);

        $this->mostrarClientes();
    }

    public function save()
    {
        $this->validate();

        $telefone = $this->clienteSelecionado->telefone;

        $pedido = Pedido::create([
            'cliente_id' => $this->clienteSelecionado->id,
            'status' => $this->form->status,
            'forma_de_pagamento_id' => $this->form->formaPagamento,
            'descricao' => $this->form->descricao,
            'telefone' => $telefone
        ]);

        $this->alert('success', 'Pedido Criado!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);

        $this->clientePedido = $pedido->id;

        $this->reset();

        $this->newPedido = false;
    }

    public function item($item)
    {

        $itemPedido = PedidoItem::where('pedido_id', $this->pedidoCliente->id)->where('item_id', $item)->get()->count();

        if ($itemPedido != null && $itemPedido > 0) {
            $this->alert('warning', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);
        } else {
            $this->detalheItem = true;

            $this->itemPedido = Item::where('id', $item)->get()->first();

            $this->totalItens = $this->itemPedido->preco;
        }
    }

    public function increment()
    {
        $this->quantidade++;

        $preco = $this->itemPedido->preco;

        $this->totalItens = intval($this->quantidade) * $preco;
    }

    public function decrement()
    {
        $this->quantidade--;

        $preco = $this->itemPedido->preco;

        $this->totalItens = $this->totalItens - $preco;
    }

    public function adicionarItem($item)
    {
        $tamanhos = implode(',', $this->tamanhosItens);

        PedidoItem::create([
            'pedido_id' => $this->pedidoCliente->id,
            'item_id' => $item,
            'quantidade' => $this->quantidade,
            'tamanho' => $tamanhos,
            'total' => $this->totalItens
        ]);

        $this->totalPedido = $this->totalItens + $this->totalPedido;
        $this->totalItens = $this->totalItens + $this->pedidoCliente->total_itens;

        Pedido::findOrFail($this->pedidoCliente->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->totalItens,
        ]);

        $this->quantidade = 1;

        $this->detalheItem = false;
    }

    public function removerItem(Item $item)
    {
        $this->pedidoItem = $item;

        $this->alert('info', 'Remover Esse Item do Pedido?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'deleteItem',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function deleteItem()
    {
        $pedido = PedidoItem::where('pedido_id', $this->pedidoCliente->id)
            ->where('item_id', $this->pedidoItem->id)->get()->first();

        $this->totalPedido = $this->totalPedido - ($this->pedidoItem->preco * $pedido->quantidade);
        $this->totalItens = $this->totalItens - ($this->pedidoItem->preco * $pedido->quantidade);

        Pedido::findOrFail($this->pedidoCliente->id)->update([
            'total_pedido' => $this->totalPedido,
            'total_itens' => $this->totalItens,
        ]);

        PedidoItem::where('pedido_id', $this->pedidoCliente->id)
            ->where('item_id', $this->pedidoItem->id)->delete();

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function concluirPedido()
    {
        Pedido::find($this->pedidoCliente->id)->update([
            'forma_de_pagamento_id' => $this->form->formaPagamento,
            'descricao' => $this->form->descricao,
            'status' => 'Concluido'
        ]);

        $this->showAutenticacao = true;
    }

    public function editarPedido()
    {
        if ($this->pedidoCliente->status == 'Aberto') {
            $this->statusPedido = 'Preparo';
        }

        Pedido::find($this->pedidoCliente->id)->update([
            'forma_de_pagamento_id' => $this->form->formaPagamento,
            'descricao' => $this->form->descricao,
            'status' => $this->statusPedido
        ]);

        if ($this->statusPedido == 'Preparo') {
            $this->alert('success', 'Pedido Indo Para O Preparo', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => false,
            ]);
        } else {
            $this->alert('success', 'Pedido Salvo', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => false,
            ]);
        }

        if ($this->statusPedido == 'Entrega') {
            $this->alert('success', 'Pedido Indo Para A Entrega', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => false,
            ]);
        }

        $this->fecharPedido();
    }

    public function mostrarAutenticacao()
    {
        $this->showAutenticacao = true;
    }

    public function autenticarPedido()
    {
        Pedido::find($this->pedidoCliente->id)->update([
            'forma_de_pagamento_id' => $this->form->formaPagamento,
            'descricao' => $this->form->descricao,
            'desconto' => $this->desconto,
            'total_pedido' => $this->pedidoDesconto,
            'status' => 'Concluido'
        ]);

        $this->alert('success', 'Pedido Concluido', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);

        $this->showAutenticacao = false;

        $this->fecharPedido();
    }

    public function render()
    {
        $clientes = Cliente::all();

        $formasDePagamentos = FormaDePagamento::all();

        $itens = Item::all();

        $tamanhos = Tamanho::all();

        $statusPedidos = StatusPedido::all();

        $pedidos = Pedido::paginate(5);

        return view('livewire.pedidos.pedidos', [
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'itens' => $itens,
            'tamanhos' => $tamanhos,
            'statusPedidos' => $statusPedidos,
            'formasDePagamentos' => $formasDePagamentos
        ]);
    }
}
