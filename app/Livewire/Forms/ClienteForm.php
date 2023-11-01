<?php

namespace App\Livewire\Forms;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ClienteForm extends Form
{
    public $clienteId;

    #[Rule('required|min:3|max:40')]
    public $nome = '';

    #[Rule('required|email|min:7|max:80')]
    public $email = '';

    #[Rule('required|min:10|max:13')]
    public $telefone = '';

    public function store()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'password' =>  Hash::make('1234')
        ]);

    }

    public function edit(Cliente $cliente)
    {
        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->email = $cliente->email;
        $this->telefone = $cliente->telefone;
    }

    public function updateCliente()
    {
        $this->validate();

        Cliente::findOrFail($this->clienteId)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone
        ]);
    }
}
