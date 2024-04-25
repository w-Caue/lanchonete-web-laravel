<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = ['user_id', 'status', 'pagamento_id', 'descricao', 'ecommerce', 'endereco_id', 'total_itens', 'desconto', 'total_pedido'];

    public function itens(){
        return $this->belongsToMany(Produto::class, 'pedidos_itens')->withPivot('quantidade', 'total');
    }

    public function pedidoItem(){
        return $this->belongsToMany('App\Models\PedidoItem', 'pedidos');
    }

    public function pessoa(){
        return $this->belongsTo(User::class);
    }

    public function formaPagamento(){
        return $this->belongsTo(FormaPagamento::class);
    }

    public function endereco(){
        return $this->belongsTo('App\Models\Endereco', 'endereco_id');
    }
}
