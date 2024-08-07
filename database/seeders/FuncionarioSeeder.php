<?php

namespace Database\Seeders;

use App\Models\Funcionario;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FuncionarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'nome' => 'Admin',
            'password' => Hash::make(123),
        ]);

        Funcionario::create([
            'user_id' => $user->id,
            'status' => 'Ativo',
        ]);
    }
}
