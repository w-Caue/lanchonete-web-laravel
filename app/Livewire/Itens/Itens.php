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

    public function novoItem(){
        $this->newItem = !$this->newItem;
    }

    public function save(){

        $this->form->store();

        $this->reset();

        $this->alert('success', 'Item Cadastrado!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
           ]);
    }

    public function render()
    {
        $itens = Item::where('nome', 'like', '%'. $this->search .'%')->paginate(4);
        $tamanhos = Tamanho::all();
        $categorias = Categoria::all();
        return view('livewire.itens.itens', [
            'itens' => $itens,
            'tamanhos' => $tamanhos,
            'categorias' => $categorias
        ]);
    }
}
