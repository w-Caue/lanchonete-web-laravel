<?php

namespace App\Livewire\Forms;

use App\Models\Pedido;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PedidoForm extends Form
{

    #[Rule('required', message: 'Selecione a Forma de Pagamento')] 
    public $pagamento = '';

    #[Rule('min:3', message: 'A observação precisa ter mais de 3 caracteres')] 
    public $observacao = '';

    
}
