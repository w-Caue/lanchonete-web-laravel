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

        if ($this->ecommerce == true) {
            $this->ecommerce = 'S';
        } else {
            $this->ecommerce = 'N';
        }

        $this->preco = str_replace(',', '.', $this->preco);
        $this->preco = floatval($this->preco);

        Produto::create([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria_id' => $this->categoria,
            'marca_id' => $this->marca,
            'tipo_ecommerce' => $this->ecommerce,
        ]);
    }

}
