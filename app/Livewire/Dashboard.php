<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class Dashboard extends Component
{
    public $clientes;

    public function mount(){
        $this->dados();
    }

    public function dados(){
        $this->clientes = User::where('type', 'Cliente')->get('id')->count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
