<?php

namespace App\Livewire\Ecommerce\Produtos;

use App\Models\Combo;
use Livewire\Component;

class CombosProdutos extends Component
{
    public $combos;

    public function combo()
    {
        $this->combos = Combo::where('ativo', 'S')->get();
    }

    public function render()
    {
        return view('livewire.ecommerce.produtos.combos-produtos');
    }
}
