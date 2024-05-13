<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PessoaForm extends Form
{
    #[Rule('required|min:3|max:60')]
    public $name = '';

    public $email = '';

    public $phone = '';

    public function save()
    {
        $this->validate();
        
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone  
        ]);

    }
}
