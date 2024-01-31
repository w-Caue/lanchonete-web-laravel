<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoItem extends Model
{
    protected $table = 'pedidos_itens';
    protected $fillable = ['pedido_id', 'produto_id', 'quantidade', 'tamanho', 'total'];
}
