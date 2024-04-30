<?php

namespace App\Livewire\Ecommerce\Pedido;

use App\Models\Endereco;
use App\Models\Pedido as ModelsPedido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pedido extends Component
{
    public $carrinho;
    public $enderecos = [];

    public $valorTotal;

    public function mount()
    {
        $this->carrinho();

        $this->entregaRetirada();
    }

    public function carrinho()
    {
        $this->carrinho = session()->get('carrinho');

        $this->valorTotal = 0;
        foreach ($this->carrinho as $index => $item) {
            $this->valorTotal += $this->carrinho[$index]['total'];
        }
    }

    public function entregaRetirada()
    {
        $entrega = session()->get('entrega');

        if ($entrega != null) {
            $this->enderecos = Endereco::where('user_id', $entrega)->get()->first();
            return;
        } else {
            // a variavel $endereço vai receber o endeço da loja para retirada
            // $this->enderecos = ['endereco' => 'Endereço', 'Bairro' => 'Bairro', 'Cidade' => 'Cidade', 'CEP' => 'CEP'];
            return;
        }
    }

    public function endereco(){
        session()->remove('entrega');

        return redirect()->route('ecommerce.localizacao');
    }

    public function pagamento(){
        // session()->remove('entrega');

        return redirect()->route('ecommerce.pagamento');
    }

    public function finalizar(){
        $user = Auth::user()->id;

        $pedido = ModelsPedido::create([
            'user_id' => $user,
        ]);
    }

    public function render()
    {
        return view('livewire.ecommerce.pedido.pedido');
    }
}
