<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    // protected $table = 'local_entrega';
    protected $fillable = [
        'pessoa_id', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'referencia'
    ];
}
