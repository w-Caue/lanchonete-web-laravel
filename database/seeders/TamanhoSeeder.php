<?php

namespace Database\Seeders;

use App\Models\Tamanho;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TamanhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tamanho::create(['nome' => 'P', 'descricao' => 'Pequeno']);
        Tamanho::create(['nome' => 'M', 'descricao' => 'Medio']);
        Tamanho::create(['nome' => 'G', 'descricao' => 'Grande']);
    }
}
