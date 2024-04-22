<?php

namespace App\Livewire\Ecommerce\Ecommerce;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CarrinhoBotao extends Component
{
    use LivewireAlert;

    public $carrinho = [];

    public $valorTotal;
    public $totalItens = 0;
    public $codigoItem;

    protected $listeners = [
        'adicionarItem' => 'adicionarItem',
    ];

    public function mount()
    {
        $this->carrinho = session()->get('carrinho');
        $this->atualizar();
    }

    public function adicionarItem($codigo, $nome, $descricao, $quantidade, $preco)
    {

        $novo = true;

        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {
                //Produto já está no carrinho, só somar a quantidade
                $this->carrinho[$index]['quantidade'] += $quantidade;
                $this->carrinho[$index]['codigo'] = $codigo;
                $this->carrinho[$index]['preco'] = $preco;
                $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                $this->carrinho[$index]['descricao'] = $descricao;

                $novo = false;
            }
        }

        if ($novo) {
            $novoItem = array(
                'codigo' => $codigo,
                'nome' => $nome,
                'descricao' => $descricao,
                'quantidade' => $quantidade,
                'preco' => $preco,
                'total' => $preco * $quantidade,
            );
            array_push($this->carrinho, $novoItem);
        }

        session()->put('carrinho', $this->carrinho);
        $this->atualizar();

        if ($codigo) {
            $this->alert('success', 'Item Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);

            $this->dispatch('close-detalhe');

            return;
        }
    }

    public function removerItem($codigo, $quantidade)
    {
        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {

                $this->carrinho[$index]['quantidade'] += $quantidade;

                if ($this->carrinho[$index]['quantidade'] < 1) {
                    $this->carrinho[$index]['quantidade'] = 0;
                }

                $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
            }
        }

        $this->atualizar();
    }

    public function remover($codigo)
    {
        // $this->valorTotal = 0;
        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {
                unset($this->carrinho[$index]);
            } else {
                $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                $this->valorTotal += $this->carrinho[$index]['total'];
            }

            // $this->codigoItem = $this->carrinho[$index]['codigo'];
        }

        session()->put('carrinho', $this->carrinho);
        $this->atualizar();

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);
    }

    public function atualizar()
    {
        foreach ($this->carrinho as $index => $item) {
            $this->valorTotal += $this->carrinho[$index]['total'];
            
            if ($this->carrinho[$index]['quantidade'] == 0) {
                unset($this->carrinho[$index]);
            }
        }
        $this->totalItens = sizeof($this->carrinho);

        session()->put('carrinho', $this->carrinho);
    }

    public function render()
    {
        return view('livewire.ecommerce.ecommerce.carrinho-botao');
    }
}
