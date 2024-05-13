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
    public $status;
    public $dataCad;

    public function pessoa($codigo)
    {
        $pessoa = User::where('id', '=', $codigo)->get()->first();

        $this->codigo = $pessoa->id;
        $this->name = $pessoa->name;
        $this->email = $pessoa->email;
        $this->phone = $pessoa->phone;
        $this->status = $pessoa->status;
        $this->dataCad = date('Y-m-d', strtotime($pessoa->created_at));
    }

    public function edit()
    {
        User::findOrFail($this->codigo)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'status' => $this->status,
        ]);
    }
}
