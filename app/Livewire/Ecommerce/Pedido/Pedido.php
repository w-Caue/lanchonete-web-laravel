<?php

namespace App\Livewire\Ecommerce\Pedido;

use App\Models\Endereco;
use App\Models\Pedido as ModelsPedido;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pedido extends Component
{
    public $carrinho;
    public $enderecos;
    public $pagamento;

    public $valorProdutos;
    public $valorTotal;

    public function mount()
    {
        $this->carrinho();

        $this->entregaRetirada();

        $this->formaPagamento();
    }

    public function carrinho()
    {
        $this->carrinho = session()->get('carrinho');

        $this->valorProdutos = 0;
        foreach ($this->carrinho as $index => $item) {
            $this->valorProdutos += $this->carrinho[$index]['total'];
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

    public function formaPagamento()
    {
        $pagamento = session()->get('pagamento');

        $this->pagamento = $pagamento;
    }

    public function endereco()
    {
        session()->remove('entrega');

        return redirect()->route('ecommerce.localizacao');
    }

    public function pagamentoPedido()
    {
        // session()->remove('entrega');

        return redirect()->route('ecommerce.pagamento');
    }

    public function finalizar()
    {
        if (!$this->enderecos) {
            $retirada = 'S';
            $endereco = 0;
        } else {
            $endereco = $this->enderecos->id;
            $retirada = 'N';
        }

        $user = Auth::user()->id;

        $pedido = ModelsPedido::create([
            'user_id' => $user,
            'status' => 'análise',
            'ecommerce' => 'S',
            'retirada' => $retirada,
            'pagamento_id' => 1,
            'endereco_id' => $endereco,
            'total_itens' => $this->valorProdutos,
            'total_pedido' => $this->valorProdutos,
        ]);

        $pedido->save();

        return redirect()->route('ecommerce.finalizar');
    }

    public function render()
    {
        return view('livewire.ecommerce.pedido.pedido');
    }
}
