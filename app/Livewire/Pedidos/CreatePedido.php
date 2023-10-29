<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoSiteForm;
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

    public $criaPedido;
    public $localizacao = '';

    public $pedido = '';
    public $meuPedido = false;

    public $clientePedido;

    public $addItem = false;
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
        $pedidoAnalise = Pedido::where('user_id', auth()->user()->id)
            ->where('status', 'Analise')->count();

        if ($pedidoAnalise > 0) {
            return redirect()->route('site.seu-pedido');
        }

        $pedidoCliente = Pedido::where('user_id', auth()->user()->id)
            ->where('status', 'Aberto')->count();

        if ($pedidoCliente == 0) {
            $this->criaPedido = true;
        } else {
            $this->criaPedido = false;
            $this->pedido = Pedido::where('user_id', auth()->user()->id)
                ->where('status', 'Aberto')->get()->first();
        }
    }

    public function visualizarPedido()
    {
        $this->meuPedido = !$this->meuPedido;

        $pedidoComEntrega = Pedido::where('user_id', auth()->user()->id)
            ->where('status', 'Aberto')
            ->where('local_entrega_id', !null)->count();

        if ($pedidoComEntrega == 1) {
            $this->statusEntrega = true;
        }
    }

    public function item()
    {
        $this->addItem = !$this->addItem;
    }


    public function setItem($item)
    {

        $pedidoItem = PedidoItem::where('pedido_id', $this->pedido['id'])->where('item_id', $item)->get()->count();

        if ($pedidoItem != null && $pedidoItem > 0) {
            $this->alert('warning', 'Item Já Adicionado!', [
                'position' => 'center',
                'timer' => 1000,
                'toast' => true,
            ]);
        } else {
            $this->item();

            $this->itemSelect = Item::where('id', $item)->get()->first();

            $this->total = $this->itemSelect->preco;
        }
    }

    #quantidade
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
    #/quantidade

    public function save()
    {
        $this->form->store();

        $this->alert('success', 'Pedido Criado!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'text' => 'Adicione os itens ao seu pedido',
        ]);

        $this->criaPedido = false;

        $this->mount();
    }

    #adicionar item ao pedido
    public function pedidoItem($item)
    {

        $tamanhos = implode(',', $this->tamanhoItem);

        PedidoItem::create([
            'pedido_id' => $this->pedido['id'],
            'item_id' => $item,
            'quantidade' => $this->count,
            'tamanho' => $tamanhos,
            'total' => $this->total
        ]);

        $this->addItem = false;
    }
    #/

    #edicão forma de pagamento e descrição
    public function update()
    {
        $this->form->edit();
    }
    #/

    #finalizar pedido
    public function finalizarPedido()
    {

        Pedido::find($this->pedido['id'])->update([
            'status' => 'Analise'
        ]);

        $this->alert('success', 'Seu Pedido Foi Para Analise', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
            'timerProgressBar' => true,
        ]);

        $this->visualizarPedido();

        return redirect()->route('site.seu-pedido');
    }
    #finalizar pedido

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

        $this->localSalvo = LocalEntrega::where('user_id', auth()->user()->id)->get();
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
            'user_id' => auth()->user()->id,
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
        $itens = Item::all();

        $formasDePagamentos = FormaDePagamento::all();

        $tamanhos = Tamanho::all();

        return view('livewire.pedidos.create-pedido', [
            'itens' => $itens,
            'formasDePagamentos' => $formasDePagamentos,
            'tamanhos' => $tamanhos
        ]);
    }
}
