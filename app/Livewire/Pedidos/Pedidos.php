<?php

namespace App\Livewire\Pedidos;

use App\Livewire\Forms\PedidoForm;
use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\FormaPagamento;
use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Pessoa;
use App\Models\Produto;
use App\Models\StatusPedido;
use App\Models\Tamanho;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Pedidos extends Component
{
    public PedidoForm $form;

    use LivewireAlert;

    use WithPagination;

    #Pesquisa
    public $search = '';

    #Novo Pedido
    public $pedido;

    public $pedidoCliente;

    #Cliente
    public $pessoas = [];
    public $cliente;

    public $clientes;
    public $pagamentos;

    public function mount()
    {
        $this->parametros();
    }

    public function mostrarPedido(Pedido $pedido)
    {
        $this->pedidoCliente = Pedido::where('id', $pedido->id)->get()->first();
    }

    public function pesquisaCliente()
    {
        $pessoas = User::select([
            'users.id',
            'users.name',
            'users.email',
            'users.phone',
            'users.ecommerce',
        ])->where('ecommerce', '=', 'N');

        $this->pessoas = $pessoas->orderBy('name')->get();
    }

    public function selecionarCliente($codigo)
    {
        $this->cliente = User::where('id', $codigo)->get()->first();

        $this->dispatch('close-modal-small');
    }

    public function save()
    {
        if ($this->cliente == null) {
            return $this->alert('warning', 'Cliente não selecionado!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => true,
            ]);
        }

        $this->validate();

        $pedido = Pedido::create([
            'user_id' => $this->cliente->id,
            'status' => 'Aberto',
            'pagamento_id' => $this->form->pagamento,
            'observacao' => $this->form->observacao,
        ]);

        $this->alert('success', 'Pedido Criado!', [
            'timer' => 3000,
            'toast' => true,
        ]);

        $this->dispatch('close-modal');

        $this->redirectRoute('admin.pedido.show', ['codigo' => $pedido->id]);
    }

    public function parametros()
    {
        $this->clientes = Pessoa::all();

        $this->pagamentos = FormaPagamento::all();
    }

    public function render()
    {
        return view('livewire.pedidos.pedidos');
    }
}
