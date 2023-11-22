<?php

namespace App\Livewire\Itens;

use App\Livewire\Forms\ItemForm;
use App\Models\Categoria;
use App\Models\Item;
use App\Models\Tamanho;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Itens extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ItemForm $form;

    public $newItem = false;

    public $search = '';

    public $menuCategoria = '';

    public function novoItem()
    {
        $this->newItem = !$this->newItem;
    }

    public function fecharItem()
    {
        $this->reset();
        $this->resetValidation();
        $this->newItem = false;
    }

    public function save()
    {
        $this->form->store();

        $this->fecharItem();

        $this->alert('success', 'Item Cadastrado!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);
    }

    public function edit(Item $item)
    {
        $this->novoItem();
        $this->form->edit($item);
    }

    public function update()
    {
        $this->form->update();

        $this->fecharItem();

        $this->alert('success', 'Item Atualizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $itens = Item::where('nome', 'like', '%' . $this->search . '%')
                        ->where('categoria_id', 'like', '%' . $this->menuCategoria)
                        ->paginate(6);

        $tamanhos = Tamanho::all();
        
        $categorias = Categoria::all();

        return view('livewire.itens.itens', [
            'itens' => $itens,
            'tamanhos' => $tamanhos,
            'categorias' => $categorias
        ]);
    }
}
