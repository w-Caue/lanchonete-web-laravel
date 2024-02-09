<?php

namespace App\Livewire\Encartes;

use App\Models\Encarte;
use Livewire\Component;

class EncarteProduto extends Component
{
    public $encarteDetalhe;

    public function mount($codigo){
        $this->encarteDetalhe = Encarte::where('id', $codigo)->get()->first();
    }

    public function render()
    {
        return view('livewire.encartes.encarte-produto');
    }
}
