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
        Tamanho::create(['tamanho' => 'P', 'descricao' => 'Pequeno']);
        Tamanho::create(['tamanho' => 'M', 'descricao' => 'Medio']);
        Tamanho::create(['tamanho' => 'G', 'descricao' => 'Grande']);
    }
}
