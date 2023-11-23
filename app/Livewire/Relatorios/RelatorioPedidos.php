<?php

namespace App\Livewire\Relatorios;

use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Pedido;
use App\Models\StatusPedido;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class RelatorioPedidos extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $showRelatorio;
    // public $pedidos;

    public $clienteRelatorio;
    public $formaPagamento;
    public $tipo;

    public $totalPedidos;

    public function mostrarRelatorio(){
        $this->showRelatorio = true;

    //     $pedido = Pedido::select([
    //         'pedido.id',
    //         'pedido.cliente_id',
    //         'pedido.user_id',
    //         'pedido.status',
    //         'pedido.descricao',
    //         'pedido.site',
    //         'pedido.local_entrega_id',
    //         'pedido.telefone',
    //         'pedido.forma_de_pagamento_id',
    //         'pedido.total_itens',
    //         'pedido.desconto',
    //         'pedido.total_pedido',
    //         'pedido.created_at',
    //     ])->where('cliente_id', 'like', '%' . $this->clienteRelatorio . '%');

    //     $this->pedidos = $pedido->orderBy('cliente_id')->get();
    }

    public function fecharRelatorio(){
        $this->showRelatorio = false;
    }

    public function render()
    {
        $pedidos = Pedido::all();

        $clientes = Cliente::all();

        $formaPagamentos = FormaDePagamento::all();

        $statusDoPedido = StatusPedido::all();

        return view('livewire.relatorios.relatorio-pedidos', [
            'clientes' => $clientes,
            'pedidos' => $pedidos,
            'statusDoPedido' => $statusDoPedido,
            'formaPagamentos' => $formaPagamentos
        ]);
    }
}
