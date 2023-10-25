<?php

namespace App\Livewire\Clientes;

use App\Livewire\Forms\ClienteForm;
use App\Models\Cliente;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class Clientes extends Component
{
    use LivewireAlert;

    use WithPagination;

    public ClienteForm $form;

    public $newCliente = false;

    public $search = '';


    public function novoCliente(){
        $this->newCliente = !$this->newCliente;
    }

    public function save(){

        $this->form->store();

        $this->reset();

        $this->alert('success', 'Cliente Cadastrado!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
           ]);

    }
    
    public function render()
    {

        $clientes = User::where('name', 'like' , '%'. $this->search .'%')
                        ->orWhere('email', 'like' , '%'. $this->search .'%')
                        ->orWhere('telefone', 'like' , '%'. $this->search .'%')
                                ->paginate(5);

        return view('livewire.clientes.clientes', ['clientes' => $clientes]);
    }
}
