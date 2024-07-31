<?php

namespace App\Livewire\Configuracao\Usuarios;

use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemUsuarios extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $readyLoad = false;

    public function load()
    {
        $this->readyLoad = true;
    }

    public function dados()
    {
        $usuarios = User::select([
            'users.*',
            'funcionarios.id as codigo',
        ])
            ->leftjoin('funcionarios', 'funcionarios.user_id', '=', 'users.id')
            ->where('users.access_level', '=', 'admin')
            // ->orderBy($this->sortFilter, $this->sortAsc ? 'ASC' : 'DESC')
        ;
    
        return $usuarios->paginate(5);
    }

    public function render()
    {
        return view('livewire.configuracao.usuarios.listagem-usuarios', [
            'usuarios' => $this->readyLoad ? $this->dados() : [],
        ]);
    }
}
