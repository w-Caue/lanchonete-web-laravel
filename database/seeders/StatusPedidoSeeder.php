<?php

namespace Database\Seeders;

use App\Models\StatusPedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StatusPedido::create(['nome' => 'Aberto']);
        StatusPedido::create(['nome' => 'Preparo']);
        StatusPedido::create(['nome' => 'Entrega']);
        StatusPedido::create(['nome' => 'Concluido']);
    }
}
