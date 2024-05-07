<?php

namespace App\Livewire\Forms;

use App\Models\Encarte;
use Livewire\Attributes\Validate;
use Livewire\Form;

class EncarteForm extends Form
{
    public $codigo;
    public $descricao;
    public $dataInicio;
    public $dataFinal;
    public $encarte;

    public function save()
    {
        $encarte = Encarte::create([
            'descricao' => $this->descricao,
            'data_inicio' => $this->dataInicio,
            'data_final' => $this->dataFinal,
        ]);

        $this->codigo = $encarte->id;

        return;
    }

    public function exibir($codigo)
    {
        $this->encarte = Encarte::where('id', $codigo)->get()->first();

        $this->descricao = $this->encarte->descricao;
        $this->dataInicio = date('Y-m-d', strtotime($this->encarte->data_inicio));
        $this->dataFinal = date('Y-m-d', strtotime($this->encarte->data_final));
    }
}
