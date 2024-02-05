<?php

namespace App\Livewire\Pessoas;

use App\Models\Pessoa;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPessoas extends Component
{
    use WithPagination;

    public function dados()
    {
        $pessoas = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.whatsapp',
            'pessoas.email',
            'pessoas.status',
            'pessoas.tipo_ecommerce',
        ]);

        return $pessoas->paginate(5);
    }

    public function render()
    {
        return view('livewire.pessoas.listagem-pessoas',[
            'pessoas' => $this->dados()
        ]);
    }
}
