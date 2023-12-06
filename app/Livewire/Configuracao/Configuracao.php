<?php

namespace App\Livewire\Configuracao;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Configuracao extends Component
{
    use LivewireAlert;

    public $showTelaUsuarios;
    public $newUser;

    #[Rule('required', 'string', 'max:255')]
    public $nomeUser;

    #[Rule('required', 'string', 'email', 'max:255', 'unique:users')]
    public $emailUser;

    #[Rule('required', 'string', 'min:4', 'confirmed')]
    public $senhaUser;

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

    public function saveUser(){
        User::create([
            'name' => $this->nomeUser,
            'email' => $this->emailUser,
            'password' => Hash::make($this->senhaUser),
        ]);

        $this->fecharUser();

        $this->alert('success', 'Usuário Cadastrado!', [
            'position' => 'center',
            'timer' => 1000,
            'toast' => false,
        ]);
    }

    public function render()
    {
        $users = User::all();
        return view('livewire.configuracao.configuracao', [
            'users' => $users
        ]);
    }
}
