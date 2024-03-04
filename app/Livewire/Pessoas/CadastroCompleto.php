<?php

namespace App\Livewire\Pessoas;

use App\Livewire\Forms\CadastroPessoaForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CadastroCompleto extends Component
{
    use LivewireAlert;

    public CadastroPessoaForm $form;

    public function mount($codigo)
    {
        $this->form->pessoa($codigo);
    }

    public function edit()
    {
        $this->form->edit();

        $this->alert('success', 'Cadastro Atualizado', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'text' => 'com sucesso!',
        ]);
    }

    public function render()
    {
        return view('livewire.pessoas.cadastro-completo');
    }
}
