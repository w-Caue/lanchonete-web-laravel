<?php

namespace App\Livewire\Configuracao;

use App\Models\User;
use Livewire\Component;

class Configuracao extends Component
{

    public $showTelaUsuarios;
    public $newUser;

    public function fecharTela(){
        $this->showTelaUsuarios = false;
    }

    public function mostrarUsuarios(){
        $this->showTelaUsuarios = true;
    }

    public function fecharUser(){
        $this->newUser = false;
    }

    public function novoUser(){
        $this->newUser = true;
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.configuracao.configuracao', [
            'users' => $users
        ]);
    }
}
