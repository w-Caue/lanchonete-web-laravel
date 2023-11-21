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
        Categoria::create(['categoria' => 'Hamburguer']);
        Categoria::create(['categoria' => 'Pizza']);
        Categoria::create(['categoria' => 'Pastel']);
        Categoria::create(['categoria' => 'Suco']);
        Categoria::create(['categoria' => 'Refrigerante']);
    }
}
