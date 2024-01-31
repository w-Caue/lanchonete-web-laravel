<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use App\Models\Produto;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ItemForm extends Form
{
    public $itemId;

    #[Rule('required|min:3|max:40')]
    public $nome = '';

    #[Rule('required|max:80')]
    public $descricao = '';

    #[Rule('required', message: 'Coloque o Valor do Item!')]
    #[Rule('numeric', message: 'Insira um Preço Valido')]
    public $preco = '';

    #[Rule('required')]
    public $tamanho = [];

    #[Rule('required')]
    public $categoria = '';

    public function store()
    {
        $this->validate();

        $tamanho = implode(',', $this->tamanho);

        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'tamanho' => $tamanho,
            'categoria_id' => $this->categoria
        ]);
    }

    // public function edit(Item $item)
    // {
    //     $this->itemId = $item->id;
    //     $this->nome = $item->nome;
    //     $this->descricao = $item->descricao;
    //     $this->preco = $item->preco;
    //     $this->tamanho = $item->tamanho;
    //     $this->categoria = $item->categoria_id;
    // }

    // public function update()
    // {
    //     Item::findOrFail($this->itemId)->update([
    //         'nome' => $this->nome,
    //         'descricao' => $this->descricao,
    //         'preco' => $this->preco,
    //         'tamanho' => $this->tamanho,
    //         'categoria_id' => $this->categoria
    //     ]);
    // }
}
