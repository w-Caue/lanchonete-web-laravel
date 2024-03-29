<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoForm;
use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\FormaPagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Pessoa;
use App\Models\Produto;
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
    public $pedido;

    public $pedidoCliente;

    #Cliente
    public $pessoas = [];
    public $cliente;

    public $clientes;
    public $pagamentos;

    public function mount()
    {
        $this->parametros();
    }

    public function mostrarPedido(Pedido $pedido)
    {
        $this->pedidoCliente = Pedido::where('id', $pedido->id)->get()->first();
    }

    public function pesquisaCliente()
    {
        $pessoas = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.email',
            'pessoas.whatsapp',
        ]);

        $this->pessoas = $pessoas->orderBy('nome')->get();
    }

    public function selecionarCliente($codigo)
    {
        $this->cliente = Pessoa::where('id', $codigo)->get()->first();

        $this->dispatch('close-detalhe');
    }

    public function save()
    {
        $pedido = Pedido::create([
            'pessoa_id' => $this->cliente->id,
            'status' => 'Aberto',
            'forma_pagamento_id' => $this->form->pagamento,
            'descricao' => $this->form->descricao,
        ]);

        $this->alert('success', 'Pedido Criado!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);

        $this->dispatch('close-modal');

        $this->redirectRoute('admin.pedido.show', ['codigo'=> $pedido->id]);
    }

    public function parametros()
    {
        $this->clientes = Pessoa::all();

        $this->pagamentos = FormaPagamento::all();
    }

    public function render()
    {
        return view('livewire.pedidos.pedidos');
    }
}
