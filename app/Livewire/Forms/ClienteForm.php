<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ClienteForm extends Form
{
    #[Rule('required|min:3|max:40')]
    public $nome = '';

    #[Rule('required|email|min:7|max:80')]
    public $email = '';

    #[Rule('required|min:10|max:13')]
    public $telefone = '';

    public function store()
    {
        $this->validate();

        User::create([
            'name' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' =>  Hash::make('1234')
        ]);

    }
}
