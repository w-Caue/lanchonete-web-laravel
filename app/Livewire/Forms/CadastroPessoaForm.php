<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CadastroPessoaForm extends Form
{
    public $codigo;
    public $name;
    public $email;
    public $phone;
    public $type;
    public $status;
    public $dataCad;

    public function pessoa($codigo)
    {
        $pessoa = User::where('id', '=', $codigo)->get()->first();

        $this->codigo = $pessoa->id;
        $this->name = $pessoa->name;
        $this->email = $pessoa->email;
        $this->phone = $pessoa->phone;
        $this->type = $pessoa->type;
        $this->status = $pessoa->status;
        $this->dataCad = date('Y-m-d', strtotime($pessoa->created_at));
    }

    public function edit()
    {
        User::findOrFail($this->codigo)->update([
            'nome' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'type' => $this->type,
            'status' => $this->status,
        ]);
    }
}
