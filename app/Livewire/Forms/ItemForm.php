<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ItemForm extends Form
{
    public $itemId;

    #[Rule('min:3', message: 'O nome ter que conter mais de 3 caracteres!')]
    #[Rule('max:40', message: 'O nome ter que conter menos de 40 caracteres!')]
    #[Rule('required', message: 'Preencha o nome do Produto!')]
    public $nome = '';

    #[Rule('max:100', message: 'A descrição ter que conter menos de 100 caracteres!')]
    #[Rule('required', message: 'Coloque uma descrição para o seu Produto!')]
    public $descricao = '';

    #[Rule('required', message: 'Coloque o preço ao seu Produto!')]
    #[Rule('numeric', message: 'Preencha com um preço Valido!')]
    public $preco = '';

    #[Rule('required', message: 'Coloque os tamanhos do seu Produto!')]
    public $tamanho = [];

    #[Rule('required', message: 'Coloque a categoria do seu Produto!')]
    public $categoria = '';

    public function store()
    {
        $this->validate();

        $tamanho = implode(',', $this->tamanho);

        Item::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'tamanho' => $tamanho,
            'categoria_id' => $this->categoria
        ]);
    }

    public function edit(Item $item)
    {
        $this->itemId = $item->id;
        $this->nome = $item->nome;
        $this->descricao = $item->descricao;
        $this->preco = $item->preco;
        $this->tamanho = $item->tamanho;
        $this->categoria = $item->categoria_id;
    }

    public function update()
    {
        Item::findOrFail($this->itemId)->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'tamanho' => $this->tamanho,
            'categoria_id' => $this->categoria
        ]);
    }
}
