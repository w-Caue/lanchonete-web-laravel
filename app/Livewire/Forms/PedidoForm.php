<?php

namespace App\Livewire\Forms;

use App\Models\Pedido;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PedidoForm extends Form
{

    #[Rule('required', message: 'Selecione a Forma de Pagamento')] 
    public $formaPagamento = '';

    #[Rule('min:5', message: 'A descrição precisa ter mais de 5 caracteres')] 
    public $descricao = '';

    public $status = 'Aberto';
    
}
