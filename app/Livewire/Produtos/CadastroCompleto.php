<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\CadastroProdutoForm;
use Livewire\Component;

class CadastroCompleto extends Component
{
    public CadastroProdutoForm $form;

    public function mount($codigo){
        $this->form->produto($codigo);
    }

    public function render()
    {
        return view('livewire.produtos.cadastro-completo');
    }
}
