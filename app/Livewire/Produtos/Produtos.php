<?php

namespace App\Livewire\Produtos;

use App\Livewire\Forms\ProdutoForm;
use App\Models\Categoria;
use App\Models\Produto;
use App\Models\Tamanho;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Produtos extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ProdutoForm $form;

    public $newItem = false;

    public $search = '';


    public function save()
    {
        $this->form->save();

        $this->alert('success', 'Cadastro Realizado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);

        $this->js('window.location.reload()');
    }

    public function edit(Produto $item)
    {
        $this->novoItem();
        // $this->form->edit($item);
    }

    public function update()
    {
        // $this->form->update();

        $this->fecharItem();

        $this->alert('success', 'Item Atualizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.produtos.produtos', [
            // 'tamanhos' => $tamanhos,
            'categorias' => $categorias
        ]);
    }
}
