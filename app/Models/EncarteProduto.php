<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncarteProduto extends Model
{
    protected $table = 'encartes_produtos';
    protected $fillable = ['encarte_id', 'produto_id'];

    public function encartes(){
        return $this->belongsTo(Encarte::class);
    }
}
