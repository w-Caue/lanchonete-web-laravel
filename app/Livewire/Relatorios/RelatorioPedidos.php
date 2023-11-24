<?php

namespace App\Livewire\Relatorios;

use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Pedido;
use App\Models\StatusPedido;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class RelatorioPedidos extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $showRelatorio;
    public $pedidos;

    public $clienteRelatorio;
    public $formaPagamento;
    public $tipo;
    public $statusPedido;

    public $totalPedidos;

    public function mostrarRelatorio(){
        $this->showRelatorio = true;

        $pedido = Pedido::select([
            'pedidos.id',
            'pedidos.cliente_id',
            'pedidos.user_id',
            'pedidos.status',
            'pedidos.descricao',
            'pedidos.site',
            'pedidos.local_entrega_id',
            'pedidos.telefone',
            'pedidos.forma_de_pagamento_id',
            'pedidos.total_itens',
            'pedidos.desconto',
            'pedidos.total_pedido',
            'pedidos.created_at',
        ])->where('cliente_id', 'like', '%' . $this->clienteRelatorio)
            // ->where('status', $this->tipo)
            ->where('forma_de_pagamento_id', 'like', '%' . $this->formaPagamento);
            // ->orWhere('status', $this->statusPedido);
            // ->orWhere('site', 'like', '%' . $this->tipo);

        $this->pedidos = $pedido->get();
    }

    public function fecharRelatorio(){
        $this->showRelatorio = false;
    }

    public function render()
    {
        // $pedidos = Pedido::all();

        $clientes = Cliente::all();

        $usuarios = User::all();

        $formaPagamentos = FormaDePagamento::all();

        $statusDoPedido = StatusPedido::all();

        return view('livewire.relatorios.relatorio-pedidos', [
            'clientes' => $clientes,
            'usuarios' => $usuarios,
            'statusDoPedido' => $statusDoPedido,
            'formaPagamentos' => $formaPagamentos
        ]);
    }
}
