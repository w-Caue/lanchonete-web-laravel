<?php

namespace App\Livewire\Forms;

use App\Models\Combo;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ComboProdutoForm extends Form
{
    public $codigo;
    public $nome;
    public $descricao;

    public function combo($codigo)
    {
        $combo = Combo::where('id', $codigo)->get()->first();

        $this->codigo = $combo->id;
        $this->nome = $combo->nome;
        $this->descricao = $combo->descricao;
    }

    public function update()
    {
        Combo::findOrFail($this->codigo)->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
        ]);
    }
}
