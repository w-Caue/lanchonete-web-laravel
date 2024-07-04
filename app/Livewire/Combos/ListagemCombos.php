<?php

namespace App\Livewire\Combos;

use App\Models\Combo;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemCombos extends Component
{
    use WithPagination;

    public $sortFilter = false;

    public function dados()
    {
        $combos = Combo::select([
            'combos.*'
        ]);

        return $combos->paginate(5);
    }

    public function render()
    {
        return view('livewire.combos.listagem-combos', [
            'combos' => $this->dados(),
        ]);
    }
}
