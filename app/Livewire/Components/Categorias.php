<?php

namespace App\Livewire\Components;

use App\Models\Categoria;
use Livewire\Component;

class Categorias extends Component
{

    public function dados(){
        $categorias = Categoria::all();

        return $categorias;
    }

    public function render()
    {
        return view('livewire.components.categorias', [
            'categorias' => $this->dados(),
        ]);
    }
}
