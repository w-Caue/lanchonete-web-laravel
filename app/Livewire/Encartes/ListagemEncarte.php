<?php

namespace App\Livewire\Encartes;

use App\Models\Encarte;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemEncarte extends Component
{
    use WithPagination;

    public $sortFilter = false;

    public function dados(){
        $encartes = Encarte::select([
            'encartes.id',
            'encartes.descricao',
            'encartes.data_inicio',
            'encartes.data_final',
            'encartes.ativo',
        ]);

        return $encartes->paginate(5);
    }

    public function render()
    {
        return view('livewire.encartes.listagem-encarte', [
            'encartes' => $this->dados(),
        ]);
    }
}
