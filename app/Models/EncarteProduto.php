<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncarteProduto extends Model
{
    protected $table = 'encartes_produtos';
    protected $fillable = ['encarte_id', 'produto_id', 'valor_promocao', 'desconto', 'quantidade_prevista'];

    
}
