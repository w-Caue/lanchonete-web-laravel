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

class PedidoSite extends Component
{
    use LivewireAlert;

    public PedidoSiteForm $form;

    public $criarPedido;
    public $showPedido;
    public $pedidoCliente;

    #Item
    public $showItem;
    public $itemId;
    public $itemPedido;
    public $tamanhoItem = [];

    public $quantidade = 1;
    public $total;
    public $totalPedido;

    public $menuCategoria = '';

    #Entrega
    public $pedidoEntrega;
    public $showEntrega;
    public $mostrarEntrega;
    public $localEntrega;

    #Endereço entrega
    public $cep;
    public $endereco;
    public $numero;
    public $complemento;
    public $referencia;
    public $bairro;

    protected $listeners = [
        'deleteItem'
    ];

    public function mount()
    {
        $pedido = Pedido::where('user_id', auth()->user()->id)
            ->where('status', 'Analise')->count();

        $pedidoPreparo = Pedido::where('user_id', auth()->user()->id)
            ->where('status', 'Preparando')->count();

        if ($pedido > 0 or $pedidoPreparo > 0) {
            return redirect()->route('site.seu-pedido');
        }

        $pedidoCliente = Pedido::where('user_id', auth()->user()->id)
            ->where('status', 'Aberto')->count();

        if ($pedidoCliente == 0) {
            $this->criarPedido = true;
        } else {
            $this->criarPedido = false;
            $this->pedidoCliente = Pedido::where('user_id', auth()->user()->id)
                ->where('status', 'Aberto')->get()->first();
        }
    }

    public function mostrarPedido()
    {
        $this->showPedido = true;

        $this->form->formaPagamento = $this->pedidoCliente->forma_de_pagamento_id;
        $this->form->descricao = $this->pedidoCliente->descricao;
        $this->totalPedido = $this->pedidoCliente->total_pedido;

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

    public function selecionarItem($item)
    {

        $pedidoItem = PedidoItem::where('pedido_id', $this->pedidoCliente->id)
            ->where('item_id', $item)->get()->count();

        if ($pedidoItem != null && $pedidoItem > 0) {
            $this->alert('warning', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);
        } else {
            $this->detalheItem();

            $this->itemPedido = Item::where('id', $item)->get()->first();

            $this->total = $this->itemPedido->preco;
        }
    }

    public function increment()
    {
        $this->quantidade++;

        $preco = $this->itemPedido->preco;

        $this->total = intval($this->quantidade) * $preco;
    }

    public function decrement()
    {
        $this->quantidade--;

        $preco = $this->itemPedido->preco;

        $this->total = $this->total - $preco;
    }

    public function adicionarItem($item)
    {
        $tamanhos = implode(',', $this->tamanhoItem);

        PedidoItem::create([
            'pedido_id' => $this->pedidoCliente->id,
            'item_id' => $item,
            'quantidade' => $this->quantidade,
            'tamanho' => $tamanhos,
            'total' => $this->total
        ]);

        $this->totalPedido = $this->total + $this->totalPedido;

        Pedido::findOrFail($this->pedidoCliente->id)->update([
            'total_pedido' => $this->totalPedido,
        ]);

        $this->quantidade = 1;

        $this->showItem = false;
    }

    public function removerItem(Item $item)
    {
        $this->itemId = $item;

        $this->alert('info', 'Remover Esse Item do Pedido?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'deleteItem',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Remover',
        ]);
    }

    public function deleteItem()
    {
        $pedido = PedidoItem::where('pedido_id', $this->pedidoCliente->id)
            ->where('item_id', $this->itemId->id)->get()->first();

        $this->totalPedido = $this->totalPedido - ($this->itemId->preco * $pedido->quantidade);

        Pedido::findOrFail($this->pedidoCliente->id)->update([
            'total_pedido' => $this->totalPedido,
        ]);

        PedidoItem::where('pedido_id', $this->pedidoCliente->id)
            ->where('item_id', $this->itemId->id)->delete();

        $this->alert('success', 'Item Removido!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function finalizarPedido()
    {
        Pedido::find($this->pedidoCliente->id)->update([
            'forma_de_pagamento_id' => $this->form->formaPagamento,
            'descricao' => $this->form->descricao,
            'status' => 'Analise'
        ]);

        return redirect()->route('site.seu-pedido');
    }

    public function fecharEntrega()
    {
        $this->showEntrega = false;
        $this->mostrarEntrega = false;
    }

    public function telaEntrega()
    {
        $this->mostrarEntrega = true;
    }

    public function entregaDePedido()
    {
        if ($this->pedidoEntrega = 'entrega') {
            $this->showEntrega = true;
        };

        $this->localEntrega = LocalEntrega::where('user_id', auth()->user()->id)->get();
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
        Pedido::find($this->pedidoCliente->id)->update([
            'local_entrega_id' => $local
        ]);

        $this->showEntrega = false;

        $this->alert('success', 'Local Selecionado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);
    }

    public function saveLocal()
    {
        $local = LocalEntrega::create([
            'user_id' => auth()->user()->id,
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'bairro' => $this->bairro,
            'referencia' => $this->referencia
        ]);

        $this->showEntrega = false;
        $this->mostrarEntrega = false;

        $this->pedidoEntrega = 'entrega';

        $this->alert('success', 'Local de Entrega Foi Salvo!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => true,
        ]);

        Pedido::find($this->pedidoCliente->id)->update([
            'local_entrega_id' => $local->id
        ]);
    }

    public function render()
    {
        $itens = Item::where('categoria_id', 'like', '%' . $this->menuCategoria)->get();

        $formasDePagamentos = FormaDePagamento::all();

        $tamanhos = Tamanho::all();

        $categorias = Categoria::all();

        return view('livewire.pedidos.pedido-site', [
            'itens' => $itens,
            'formasDePagamentos' => $formasDePagamentos,
            'tamanhos' => $tamanhos,
            'categorias' => $categorias
        ]);
    }
}
