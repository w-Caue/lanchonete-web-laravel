<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalEntrega extends Model
{
    protected $table = 'local_entrega';
    protected $fillable = ['user_id', 'cep', 'endereco'
                            , 'numero', 'complemento', 'bairro', 'referencia'];
}
