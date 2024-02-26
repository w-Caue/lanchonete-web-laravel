<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    // protected $table = 'itens';
    protected $fillable = ['nome', 'descricao', 'preco', 'tamanho', 'categoria_id', 'marca_id', 'grupo_id', 'tipo_ecommerce', 'imagem'];

    public function tamanho()
    {
        return $this->belongsTo('App\Models\Tamanho');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Models\Pedido', 'pedidos_itens', 'pruduto_id', 'pedido_id');
    }

    public function encarte(){
        return $this->belongsTo('App\Models\Encarte');
    }
}
