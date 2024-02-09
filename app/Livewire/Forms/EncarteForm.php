<?php

namespace App\Livewire\Forms;

use App\Models\Encarte;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EncarteForm extends Form
{
    public $descricao;
    public $dataInicio;
    public $dataFinal;

    public function save(){
        Encarte::create([
            'descricao' => $this->descricao,
            'data_inicio' => $this->dataInicio,
            'data_final' => $this->dataFinal,
        ]);
    }
}
