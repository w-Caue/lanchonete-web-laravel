<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\CadastroProdutoForm;
use App\Models\Categoria;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class CadastroCompleto extends Component
{
    use WithFileUploads;

    use LivewireAlert;

    public CadastroProdutoForm $form;

    public $categorias;

    public function mount($codigo)
    {
        $this->form->produto($codigo);

        $this->parametros();
    }

    public function edit()
    {
        $this->form->edit();

        $this->alert('success', 'Cadastro Atualizado', [
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function parametros()
    {
        $this->categorias = Categoria::all();
    }

    public function render()
    {
        return view('livewire.produtos.cadastro-completo');
    }
}
