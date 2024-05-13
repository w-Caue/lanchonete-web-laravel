<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = ['user_id', 'status', 'pagamento_id', 'observacao', 'ecommerce', 'retirada', 'endereco_id', 'total_itens', 'desconto', 'total_pedido'];

    public function itens()
    {
        return $this->belongsToMany(Produto::class, 'pedidos_itens')->withPivot('quantidade', 'total');
    }

    public function pedidoItem()
    {
        return $this->belongsToMany('App\Models\PedidoItem', 'pedidos');
    }

    public function pessoa()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function pagamento()
    {
        return $this->belongsTo(FormaPagamento::class);
    }

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco', 'endereco_id');
    }
}
