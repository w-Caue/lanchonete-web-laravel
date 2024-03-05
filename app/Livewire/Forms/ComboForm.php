<?php

namespace App\Livewire\Forms;

use App\Models\Combo;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ComboForm extends Form
{
    public $nome;

    public function save()
    {
        Combo::create([
            'nome' => $this->nome,
        ]);
    }
}
