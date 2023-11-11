<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoSiteForm;
use App\Models\Categoria;
use App\Models\FormaDePagamento;
use App\Models\Item;
use App\Models\LocalEntrega;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Tamanho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\Features\SupportConsoleCommands\Commands\Upgrade\ThirdPartyUpgradeNotice;
use RealRashid\SweetAlert\SweetAlertServiceProvider;

class CreatePedido extends Component
{
    use LivewireAlert;

    public PedidoSiteForm $form;

    public $criarPedido;

    public $pedidoCliente;
    public $pedido = '';
    public $showPedido;

    public $clientePedido;

    public $menuCategoria = '';
    public $localizacao = '';

    public $showItem;
    public $itemSelect;
    public $tamanhoItem = [];

    public $itemPedido = '';
    public $formaPagamento = '';

    public $count = '1';
    public $total = '';

    public $pedidoEntrega = '';
    public $entrega = false;

    public $localDeEntrega = '';
    public $localSalvo;

    public $statusEntrega;

    #Pesquisa cep
    public $cep;
    public $endereco;

    public $numero;
    public $complemento;

    public $referencia;
    public $bairro;

    public function mount()
    {
        $pedido = Pedido::where('cliente_id', auth()->user()->id)
            ->where('status', 'Analise')->count();

        $pedidoPreparo = Pedido::where('cliente_id', auth()->user()->id)
            ->where('status', 'Preparando')->count();

        if ($pedido > 0 or $pedidoPreparo > 0) {
            return redirect()->route('site.seu-pedido');
        }

        $pedidoCliente = Pedido::where('cliente_id', auth()->user()->id)
            ->where('status', 'Aberto')->count();

        if ($pedidoCliente == 0) {
            $this->criarPedido = true;
        } else {
            $this->criarPedido = false;
            $this->pedidoCliente = Pedido::where('cliente_id', auth()->user()->id)
                ->where('status', 'Aberto')->get()->first();
        }
    }

    public function mostrarPedido()
    {
        $this->showPedido = true;

        $this->form->formaPagamento = $this->pedidoCliente->forma_de_pagamento_id;
        $this->form->descricao = $this->pedidoCliente->descricao;
        
        if ($this->pedidoCliente->local_entrega_id > 0) {
            $this->pedidoEntrega = 'entrega';
        }
    }

    public function fecharPedido()
    {
        $this->showPedido = false;
    }

    public function save()
    {
        $this->form->store();

        $this->alert('success', 'Pedido Criado!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'text' => 'Adicione os itens ao seu pedido',
        ]);

        $this->criarPedido = false;

        $this->mount();
    }

    public function detalheItem()
    {
        $this->showItem = !$this->showItem;
    }

    public function setItem($item)
    {

        $itemPedido = PedidoItem::where('pedido_id', $this->pedidoCliente->id)
                    ->where('item_id', $item)->get()->count();

        if ($itemPedido != null && $itemPedido > 0) {
            $this->alert('warning', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);
        } else {
            $this->detalheItem();

            $this->itemSelect = Item::where('id', $item)->get()->first();

            $this->total = $this->itemSelect->preco;
        }
    }

    public function increment()
    {
        $this->count++;

        $preco = $this->itemSelect->preco;

        $this->total = intval($this->count) * $preco;
    }

    public function decrement()
    {
        $this->count--;

        $preco = $this->itemSelect->preco;

        $this->total = $this->total - $preco;
    }

    public function pedidoItem($item)
    {
        $tamanhos = implode(',', $this->tamanhoItem);

        PedidoItem::create([
            'pedido_id' => $this->pedidoCliente->id,
            'item_id' => $item,
            'quantidade' => $this->count,
            'tamanho' => $tamanhos,
            'total' => $this->total
        ]);

        $this->showItem = false;
    }

    public function finalizarPedido()
    {
        Pedido::find($this->pedidoCliente->id)->update([
            'forma_de_pagamento_id' => $this->form->formaPagamento,
            'descricao' => $this->form->descricao,
            'status' => 'Analise'
        ]);

        $this->alert('success', 'Seu Pedido Sera Analisado', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);

        $this->fecharPedidoPedido();

        return redirect()->route('site.seu-pedido');
    }

    #entrega
    public function visualizarEntrega()
    {
        $this->entrega = false;
    }

    public function entregaDePedido()
    {
        if ($this->pedidoEntrega = 'entrega') {
            $this->entrega = true;
        };

        $this->localSalvo = LocalEntrega::where('cliente_id', auth()->user()->id)->get();
    }

    public function updatedCep()
    {

        $uri = curl_init("https://viacep.com.br/ws/{$this->cep}/json/");
        curl_setopt($uri, CURLOPT_RETURNTRANSFER, true);
        $result = json_decode(curl_exec($uri));
        curl_close($uri);

        $this->endereco = $result->logradouro;
        $this->complemento = $result->complemento;
        $this->bairro = $result->bairro;
    }

    public function localizacaoEntrega($local)
    {
        Pedido::find($this->pedido['id'])->update([
            'local_entrega_id' => $local
        ]);

        $this->entrega = false;

        $this->alert('success', 'Local Selecionado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);
    }

    public function saveLocal()
    {
        $this->localDeEntrega = LocalEntrega::create([
            'cliente_id' => auth()->user()->id,
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'referencia' => $this->referencia
        ]);

        $this->entrega = false;

        $this->alert('success', 'Local de Entrega Foi Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);
    }
    #/entrega

    public function render()
    {
        $itens = Item::where('categoria_id', 'like', '%' . $this->menuCategoria)->get();

        $formasDePagamentos = FormaDePagamento::all();

        $tamanhos = Tamanho::all();

        $categorias = Categoria::all();

        return view('livewire.pedidos.create-pedido', [
            'itens' => $itens,
            'formasDePagamentos' => $formasDePagamentos,
            'tamanhos' => $tamanhos,
            'categorias' => $categorias
        ]);
    }
}
