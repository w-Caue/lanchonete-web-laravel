<?php

namespace App\Livewire\Pessoas;

use App\Livewire\Forms\CadastroPessoaForm;
use Livewire\Component;

class CadastroCompleto extends Component
{
    public CadastroPessoaForm $form;

    public function mount($codigo){
        $this->form->pessoa($codigo);
    }

    public function render()
    {
        return view('livewire.pessoas.cadastro-completo');
    }
}
