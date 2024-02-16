<?php

namespace App\Livewire\Ecommerce\Pedidos;

use App\Models\FormaDePagamento;
use App\Models\FormaPagamento;
use Illuminate\Contracts\Session\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Pedido extends Component
{
    use LivewireAlert;

    public $carrinho;

    public $codigoItem;
    public $pagamento = '';

    public $valorTotal = 0;

    public function mount()
    {
        $this->carrinho = session()->get('carrinho');

        // dd(session()->all());
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
    public function formaPagamento(){
        session()->put('pagamento', $this->pagamento);
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

            $this->codigoItem = $this->carrinho[$index]['codigo'];
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
        $this->pagamento = session()->get('pagamento');

        session()->put('carrinho', $this->carrinho);
    }

    public function render()
    {
        return view('livewire.ecommerce.pedidos.pedido', [
            'formaPagamento' => FormaPagamento::all(),
        ]);
    }
}
