<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoForm;
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

    #Selecionar Cliente
    public $searchCliente = false;
    public $clientePedido;

    public $clienteSelecionado;
    public $clientes;

    public $allClientes = [];
    public $cliente;

    public $pedidoItem = false;
    public $itemPedido = false;
    public $meuPedido = false;

    public $pedidoCliente;
    public $itemSelect;

    public $pedidoClienteAberto;
    public $pedidoAnalise;
    public $pedidoConcluido;

    public $count = '1';
    public $total = '';

    public function novoPedido()
    {
        $this->newPedido = !$this->newPedido;
    }

    public function itemNoPedido()
    {
        $this->pedidoItem = !$this->pedidoItem;
    }

    #Selecionar Cliente
    public function visualizarClientes()
    {
        $this->searchCliente = !$this->searchCliente;
    }

    public function pedidoAberto(Pedido $pedido)
    {
        $this->pedidoCliente = $pedido->id;

        $this->pedidoClienteAberto = $pedido;

        $this->itemNoPedido();
    }

    public function visualizarPedido()
    {
        $this->meuPedido = !$this->meuPedido;
    }

    public function visualizarItem()
    {
        $this->itemPedido = !$this->itemPedido;
    }

    public function pesquisaCliente()
    {

        $users = User::select([
            'users.id',
            'users.name',
            'users.email',
            'users.telefone',
        ])->where('name', 'like', '%' . $this->clientePedido . '%');

        $this->allClientes = $users->orderBy('name')->get()->toArray();
    }

    public function setCliente($user)
    {
        $this->clientePedido = '';
        $this->clienteSelecionado = User::where('id', $user)->get()->first();

        $this->alert('success', 'Cliente Selecionado', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);

        $this->visualizarClientes();
    }

    public function save()
    {
        $this->validate();

        $telefone = $this->clienteSelecionado->telefone;

        $pedido = Pedido::create([
            'user_id' => $this->clienteSelecionado->id,
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

        $this->pedidoItem = true;
    }

    public function item($item)
    {

        $pedidoItem = PedidoItem::where('pedido_id', $this->pedidoCliente)->where('item_id', $item)->get()->count();

        if ($pedidoItem != null && $pedidoItem > 0) {
            $this->alert('warning', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);
        } else {
            $this->itemPedido = true;

            $this->itemSelect = Item::where('id', $item)->get()->first();

            $this->total = $this->itemSelect->preco;
        }
    }

    public function increment()
    {
        $this->count++;

        $preco = $this->itemSelect->preco;

        $this->total = intval($this->count) * $preco;
    }

    public function decrement()
    {
        $this->count--;

        $preco = $this->itemSelect->preco;

        $this->total = $this->total - $preco;
    }

    public function adicionarItem($item)
    {
        PedidoItem::create([
            'pedido_id' => $this->pedidoCliente,
            'item_id' => $item,
            'quantidade' => $this->count,
            'total' => $this->total
        ]);

        $this->itemPedido = false;
    }

    public function finalizarPedido()
    {

        Pedido::find($this->pedidoCliente)->update([
            'status' => 'Finalizado'
        ]);

        $this->alert('success', 'Pedido Finalizado', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);

        $this->visualizarPedido();

        $this->itemNoPedido();
    }

    public function fecharAnalise()
    {
        $this->pedidoAnalise = false;
        $this->pedidoConcluido = false;
    }

    public function analisarPedido(Pedido $pedido)
    {
        $this->pedidoAnalise = true;

        $this->pedidoCliente = $pedido;
    }

    public function prepararPedido($pedido)
    {
        Pedido::find($pedido)->update([
            'status' => 'Preparando'
        ]);

        $this->pedidoAnalise = false;

        $this->alert('success', 'Pedido Indo Para O Preparo', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);
    }

    public function pedidoVisualizar(Pedido $pedido)
    {
        $this->pedidoAnalise = true;

        $this->pedidoCliente = $pedido;

        $this->pedidoConcluido = true;
    }

    public function render()
    {
        $users = User::all();

        $formasDePagamentos = FormaDePagamento::all();

        $itens = Item::all();

        $tamanhos = Tamanho::all();

        $pedidos = Pedido::where('user_id', 'like', '%' . $this->search . '%')->paginate(5);

        return view('livewire.pedidos.pedidos', [
            'pedidos' => $pedidos,
            'users' => $users,
            'itens' => $itens,
            'tamanhos' => $tamanhos,
            'formasDePagamentos' => $formasDePagamentos
        ]);
    }
}
