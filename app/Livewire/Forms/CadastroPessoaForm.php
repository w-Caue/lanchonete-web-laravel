<?php

namespace App\Livewire\Forms;

use App\Models\Pessoa;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CadastroPessoaForm extends Form
{
    public $codigo;
    public $nome;
    public $email;
    public $whatsapp;
    public $status;
    public $dataCad;

    public function pessoa($codigo)
    {
        $pessoa = Pessoa::where('id', '=', $codigo)->get()->first();

        $this->codigo = $pessoa->id;
        $this->nome = $pessoa->nome;
        $this->email = $pessoa->email;
        $this->whatsapp = $pessoa->whatsapp;
        $this->status = $pessoa->status;
        $this->dataCad = date('Y-m-d', strtotime($pessoa->created_at));
    }

    public function edit()
    {
        Pessoa::findOrFail($this->codigo)->update([
            'nome' => $this->nome,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'status' => $this->status,
        ]);
    }
}
