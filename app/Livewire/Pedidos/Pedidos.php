<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoForm;
use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
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

    #Cliente
    public $showCliente = false;
    public $clientePedido;
    public $clienteSelecionado;
    public $clientes;
    public $pesquisaClientes = [];
    public $cliente;

    #Item pedido
    public $count = '1';
    public $total = '';
    public $totalPedido = '0';

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
        $this->totalPedido = $this->pedidoCliente->total;
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
            'timer' => 3000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);

        $this->clientePedido = $pedido->id;

        $this->reset();

        $this->newPedido = false;

        // $this->pedidoItem = true;
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

            $this->total = $this->itemPedido->preco;
        }
    }

    public function increment()
    {
        $this->count++;

        $preco = $this->itemPedido->preco;

        $this->total = intval($this->count) * $preco;
    }

    public function decrement()
    {
        $this->count--;

        $preco = $this->itemPedido->preco;

        $this->total = $this->total - $preco;
    }

    public function adicionarItem($item)
    {
        PedidoItem::create([
            'pedido_id' => $this->pedidoCliente->id,
            'item_id' => $item,
            'quantidade' => $this->count,
            'total' => $this->total
        ]);

        $this->totalPedido = $this->total + $this->totalPedido;

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

        PedidoItem::where('pedido_id', $this->pedidoCliente->id)
            ->where('item_id', $this->pedidoItem->id)->delete();

        $this->totalPedido = $this->totalPedido - $this->pedidoItem->preco;

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

        $this->alert('success', 'Pedido Concluido', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);

        $this->fecharPedido();

        // $this->itemNoPedido();
    }

    public function prepararPedido()
    {
        Pedido::find($this->pedidoCliente->id)->update([
            'total' => $this->totalPedido,
            'status' => 'Preparo'
        ]);

        $this->fecharPedido();

        $this->alert('success', 'Pedido Sendo Preparado', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function entregarPedido()
    {
        Pedido::find($this->pedidoCliente->id)->update([
            'status' => 'Entrega'
        ]);

        $this->fecharPedido();

        $this->alert('success', 'Pedido Foi Para Entrega!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function render()
    {
        $clientes = Cliente::all();

        $formasDePagamentos = FormaDePagamento::all();

        $itens = Item::all();

        $tamanhos = Tamanho::all();

        $pedidos = Pedido::where('cliente_id', 'like', '%' . $this->search . '%')->paginate(5);

        return view('livewire.pedidos.pedidos', [
            'pedidos' => $pedidos,
            'clientes' => $clientes,
            'itens' => $itens,
            'tamanhos' => $tamanhos,
            'formasDePagamentos' => $formasDePagamentos
        ]);
    }
}