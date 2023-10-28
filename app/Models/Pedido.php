<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = ['user_id', 'status', 'forma_de_pagamento_id', 'descricao', 'site', 'local_entrega_id', 'telefone'];

    public function itens(){
        return $this->belongsToMany('App\Models\Item', 'pedidos_itens');
    }

    public function pedidoItem(){
        return $this->belongsToMany('App\Models\PedidoItem', 'pedidos_id');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function formaPagamento(){
        return $this->belongsTo('App\Models\FormaDePagamento', 'forma_de_pagamento_id');
    }
}
