<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\CadastroProdutoForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CadastroCompleto extends Component
{
    use LivewireAlert;

    public CadastroProdutoForm $form;

    public function mount($codigo)
    {
        $this->form->produto($codigo);
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
        return view('livewire.produtos.cadastro-completo');
    }
}
