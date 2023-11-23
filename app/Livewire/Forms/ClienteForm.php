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

    #[Rule('min:3', message: 'O nome ter que conter mais de 3 caracteres!')]
    #[Rule('max:40', message: 'O nome ter que conter menos de 40 caracteres!')]
    #[Rule('required', message: 'Preencha o nome do seu Cliente!')]
    public $nome = '';

    #[Rule('min:7', message: 'O email ter que conter mais de 7 caracteres!')]
    #[Rule('max:100', message: 'O email ter que conter menos de 100 caracteres!')]
    #[Rule('email', message: 'Preencha com um email válido!')]
    public $email = '';

    #[Rule('min:8', message: 'O telefone ter que conter mais de 8 caracteres!')]
    #[Rule('max:12', message: 'O telefone ter que conter menos de 12 caracteres!')]
    #[Rule('numeric', message: 'Preencha com um número válido!')]
    public $telefone = '';

    public function store()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'email' => $this->email,
            'telefone' => $this->telefone  
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
