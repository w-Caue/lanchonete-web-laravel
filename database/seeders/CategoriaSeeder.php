<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['nome' => 'Hamburguer']);
        Categoria::create(['nome' => 'Pizza']);
        Categoria::create(['nome' => 'Pastel']);
        Categoria::create(['nome' => 'Suco']);
        Categoria::create(['nome' => 'Refrigerante']);
    }
}
