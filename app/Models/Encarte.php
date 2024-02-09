<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encarte extends Model
{
    use HasFactory;
    protected $fillable = ['descricao', 'data_inicio', 'data_final', 'ativo'];
}
