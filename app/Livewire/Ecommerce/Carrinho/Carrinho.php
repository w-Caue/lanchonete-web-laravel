<?php

namespace App\Livewire\Ecommerce\Carrinho;

use App\Models\FormaDePagamento;
use App\Models\FormaPagamento;
use Illuminate\Contracts\Session\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Carrinho extends Component
{
    use LivewireAlert;

    public $carrinho;

    public $pagamento = '';

    public $valorTotal = 0;

    public function mount()
    {
        $this->carrinho = session()->get('carrinho');
        $this->atualizar();
    }

    public function adicionarItem($codigo, $quantidade, $preco)
    {
        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {
                
                $this->carrinho[$index]['quantidade'] += $quantidade;
                $this->carrinho[$index]['codigo'] = $codigo;
                $this->carrinho[$index]['preco'] = $preco;
                $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
            }
        }

        $this->atualizar();
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
        foreach ($this->carrinho as $index => $item) {
            if ($codigo == $item['codigo']) {
                unset($this->carrinho[$index]);
            } else {
                $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
            }

        }

        session()->put('carrinho', $this->carrinho);

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);

        $this->atualizar();
    }

    public function atualizar()
    {
        $this->valorTotal = 0;
        foreach ($this->carrinho as $index => $item) {
            $this->valorTotal += $this->carrinho[$index]['total'];

            if($this->carrinho[$index]['quantidade'] == 0){
                unset($this->carrinho[$index]);
            }

        }
        $this->pagamento = session()->get('pagamento');

        session()->put('carrinho', $this->carrinho);
    }

    public function render()
    {
        return view('livewire.ecommerce.carrinho.carrinho');
    }
}
