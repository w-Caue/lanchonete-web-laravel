<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PessoaForm extends Form
{
    #[Rule('required|min:3|max:40')]
    public $nome = '';

    public $email = '';

    public $whatsapp = '';

    public function save()
    {
        $this->validate();
        
        Pessoa::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp  
        ]);

    }
}
