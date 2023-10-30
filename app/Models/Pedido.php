<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{

    protected $fillable = ['cliente_id', 'status', 'forma_de_pagamento_id', 'descricao', 'site', 'local_entrega_id', 'telefone'];

    public function itens(){
        return $this->belongsToMany('App\Models\Item', 'pedidos_itens');
    }

    public function pedidoItem(){
        return $this->belongsToMany('App\Models\PedidoItem', 'pedidos');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente', 'cliente_id');
    }

    public function formaPagamento(){
        return $this->belongsTo('App\Models\FormaDePagamento', 'forma_de_pagamento_id');
    }

    public function localEntrega(){
        return $this->belongsTo('App\Models\LocalEntrega', 'local_entrega_id');
    }
}
