<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarte extends Model
{
    protected $fillable = ['descricao', 'data_inicio', 'data_final', 'ativo'];

    public function produtos(){
        return $this->belongsToMany('App\Models\Produto', 'encartes_produtos');
    }

    public function encarteProduto(){
        return $this->belongsToMany('App\Models\EncarteProduto', 'encartes');
    }
}
