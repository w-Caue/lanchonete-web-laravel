<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComboProduto extends Model
{
    use HasFactory;
    protected $table = 'combos_produtos';
    protected $fillable = ['combo_id', 'produto_id', 'valor_produto'];
}
