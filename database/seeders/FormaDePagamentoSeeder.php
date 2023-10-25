<?php

namespace Database\Seeders;

use App\Models\FormaDePagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaDePagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FormaDePagamento::create(['nome' => 'Dinheiro']);
        FormaDePagamento::create(['nome' => 'Pix']);
        FormaDePagamento::create(['nome' => 'Cartão de Credito']);
        FormaDePagamento::create(['nome' => 'Cartão de Debito']);
    }
}
