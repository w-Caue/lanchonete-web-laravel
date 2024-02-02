<?php

namespace App\Livewire\Ecommerce\Pedidos;

use Illuminate\Contracts\Session\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Pedido extends Component
{
    use LivewireAlert;

    public $carrinho;

    public $valorTotal = 0;

    public function mount()
    {
        $this->carrinho = session()->get('carrinho');

        // dd($this->carrinho);
        $this->atualizar();
    }

    public function remover($codigo)
    {
        // $this->valorTotal = 0;
        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {
                unset($this->carrinho[$index]);
            } else {
                // $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
                // $this->valorTotal += $this->carrinho[$index]['total'];
            }
        }

        // dd($this->carrinho);
        session()->put('carrinho', $this->carrinho);

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

            if($this->carrinho[$index]['quantidade'] == 0){
                unset($this->carrinho[$index]);
            }
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.pedidos.pedido');
    }
}
