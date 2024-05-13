<?php

namespace App\Livewire\Pedidos;

use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPedidos extends Component
{
    use WithPagination;

    public $search;

    public function dados()
    {
        $pedidos = Pedido::select([
            'pedidos.id',
            'pedidos.user_id',
            'users.name as cliente_nome',
            'pedidos.observacao',
            'pedidos.status',
            'pedidos.pagamento_id',
            'pedidos.total_itens',
            'pedidos.total_pedido',
        ])
            ->leftjoin('users', 'users.id', '=', 'pedidos.user_id')
            #Filtros
            ->when($this->search, function ($query) {
                return $query->where('name', 'LIKE', "%" . $this->search . "%");
            });

        return $pedidos->paginate(5);
    }

    public function render()
    {
        return view('livewire.pedidos.listagem-pedidos', [
            'pedidos' => $this->dados(),
        ]);
    }
}
