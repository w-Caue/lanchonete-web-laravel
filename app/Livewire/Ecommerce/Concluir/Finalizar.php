<?php

namespace App\Livewire\Ecommerce\Concluir;

use App\Models\Cliente;
use App\Models\Endereco;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Livewire\Component;

class Finalizar extends Component
{
    public $cliente;
    public $carrinho;
    public $localizacao;
    public $pagamento;

    public $valorTotal;

    public $pedido;
    public $pedidoEcommerce;

    public function mount()
    {
        $this->informacoes();
        $this->pedidoEcommerce = session()->get('pedidoEcommerce');
        $this->pedido();
    }

    public function dados()
    {
        $cliente = Cliente::create([
            'nome' => $this->cliente[0]['nome'],
            'whatsapp' => $this->cliente[0]['whatsapp'],
            'email' => $this->cliente[0]['email'],
            'tipo_ecommerce' => 'S',
        ]);

        $endereco = Endereco::create([
            'cliente_id' => $cliente->id,
            'cep' => $this->localizacao[0]['cep'],
            'endereco' => $this->localizacao[0]['endereco'],
            'numero' => $this->localizacao[0]['numero'],
            'complemento' => $this->localizacao[0]['complemento'],
            'bairro' => $this->localizacao[0]['bairro'],
            'referencia' => $this->localizacao[0]['referencia'],
        ]);

        $pedido = Pedido::create([
            'cliente_id' => $cliente->id,
            'status' => 'Ecommerce',
            'ecommerce' => 'S',
            'forma_de_pagamento_id' => $this->pagamento,
            'endereco_id' => $endereco->id,
        ]);


        foreach ($this->carrinho as $index => $item) {
            PedidoItem::create([
                'pedido_id' => $pedido->id,
                'produto_id' => $this->carrinho[$index]['codigo'],
                'quantidade' => $this->carrinho[$index]['quantidade'],
                'total' => $this->carrinho[$index]['total'],
            ]);
            $this->carrinho[$index]['total'] =  $this->carrinho[$index]['quantidade'] * $this->carrinho[$index]['preco'];
            $this->valorTotal += $this->carrinho[$index]['total'];
        }

        Pedido::findOrFail($pedido->id)->update([
            'total_itens' => $this->valorTotal,
            'total_pedido' => $this->valorTotal,
        ]);

        session()->put('pedidoEcommerce', $pedido->id);
    }

    public function informacoes()
    {
        $this->cliente = session()->get('cliente');
        $this->carrinho = session()->get('carrinho');
        $this->localizacao = session()->get('localizacao');
        $this->pagamento = session()->get('pagamento');
    }

    public function pedido()
    {
        $this->pedido = Pedido::where('id', '=', $this->pedidoEcommerce)->get()->first();
    }

    public function render()
    {
        if ($this->pedidoEcommerce == null) {
            $this->dados();
        }
        // dd($this->pedidoEcommerce);
        return view('livewire.ecommerce.concluir.finalizar');
    }
}
