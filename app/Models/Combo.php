<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = ['nome','descricao', 'valor_total', 'desconto', 'ativo', 'imagem'];

    public function produtos(){
        return $this->belongsToMany('App\Models\Produto', 'combos_produtos');
    }
}
