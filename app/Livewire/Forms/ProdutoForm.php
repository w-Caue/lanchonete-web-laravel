<?php

namespace App\Livewire\Forms;

use App\Models\Item;
use App\Models\Produto;
use Livewire\Attributes\Rule;
use Livewire\Form;

class ProdutoForm extends Form
{
    public $itemId;

    #[Rule('required|min:3|max:40')]
    public $nome = '';

    #[Rule('required|max:80')]
    public $descricao = '';

    #[Rule('required', message: 'Coloque o Preço do Produto!')]
    public $preco;

    public $categoria;

    public $marca;

    public $ecommerce;

    public function save()
    {
        $this->validate();

        if($this->ecommerce == true){
            $this->ecommerce = 'S';
        } else {
            $this->ecommerce = 'N';
        }

        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria_id' => $this->categoria,
            'marca_id' => $this->marca,
            'tipo_ecommerce' => $this->ecommerce,
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
