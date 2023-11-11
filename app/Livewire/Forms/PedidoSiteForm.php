<?php

namespace App\Livewire\Forms;

use App\Models\LocalEntrega;
use App\Models\Pedido;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PedidoSiteForm extends Form
{

    #[Rule('required', message: 'Coloque Um Número Para Contato!')]
    public $telefone = '';

    #[Rule('required', message: 'Selecione a Forma de Pagamento')]
    public $formaPagamento = '';

    public $descricao = '';

    public $pedidoCliente;

   

    public function store()
    {
        $this->validate();

        $pedido = Pedido::create([
            'cliente_id' => auth()->user()->id,
            'status' => 'Aberto',
            'forma_de_pagamento_id' => $this->formaPagamento,
            'descricao' => $this->descricao,
            'site' => 'S',
            'telefone' => $this->telefone

        ]);

        $this->pedidoCliente = $pedido;
    }

    public function edit(){
        Pedido::find($this->pedidoCliente['id'])->update([
            'forma_de_pagamento_id' => $this->formaPagamento,
            'descricao' => $this->descricao
        ]);
    }

    
}
