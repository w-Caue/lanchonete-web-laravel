<?php

namespace App\Livewire\Forms;

use App\Models\Produto;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CadastroProdutoForm extends Form
{
    public $codigo;

    #[Rule('required|min:3|max:40')]
    public $nome = '';

    #[Rule('required|max:80')]
    public $descricao = '';

    #[Rule('required', message: 'Coloque o Preço do Produto!')]
    public $preco;

    public $categoria;

    public $marca;

    public $grupo;

    public $dataCad;

    public function produto($codigo){
        $produto = Produto::where('id', '=', $codigo)->get()->first();

        $this->codigo = $produto->id;
        $this->nome = $produto->nome;
        $this->descricao = $produto->descricao;
        $this->preco = number_format($produto->preco, 2, ',');
        $this->categoria = $produto->categoria_id;
        $this->marca = $produto->marca_id;
        $this->grupo = $produto->grupo_id;
        $this->dataCad = date('Y-m-d', strtotime($produto->created_at));
    }

    public function edit(){
        Produto::findOrFail($this->codigo)->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'preco' => $this->preco,
            'categoria_id' => $this->categoria,
            'marca_id' => $this->marca,
            'grupo_id' => $this->grupo,
            'imagem' => '',
        ]);
    }
}
