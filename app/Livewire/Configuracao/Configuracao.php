<?php

namespace App\Livewire\Configuracao;

use App\Models\FormaPagamento;
use Livewire\Component;

class Configuracao extends Component
{
    public $readyLoad = false;

    public function load()
    {
        $this->readyLoad = true;
    }

    public function render()
    {
        $pagamentos = FormaPagamento::all();

        return view('livewire.configuracao.configuracao', [
            'pagamentos' => $this->readyLoad ? $pagamentos : [],
        ]);
    }
}
