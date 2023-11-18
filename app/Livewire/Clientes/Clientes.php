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
    public $cliente;

    protected $listeners = [
        'delete'
    ];


    public function novoCliente()
    {
        $this->newCliente = !$this->newCliente;
    }

    public function fecharCliente()
    {
        $this->reset();
        $this->newCliente = false;
    }

    public function save()
    {
        $this->form->store();

        $this->reset();

        $this->alert('success', 'Cliente Cadastrado!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
        ]);
    }

    public function editCliente(Cliente $cliente)
    {
        $this->novoCliente();

        $this->form->edit($cliente);
    }

    public function update()
    {
        $this->form->updateCliente();

        $this->alert('success', 'Cadastro Atualizado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);

        $this->fecharCliente();
    }

    public function remover(Cliente $cliente)
    {
        $this->cliente = $cliente;

        $this->alert('info', 'Deletar esse cliente?', [
            'position' => 'center',
            'timer' => 5000,
            'toast' => false,
            'showConfirmButton' => true,
            'confirmButtonColor' => '#3085d6',
            'onConfirmed' => 'delete',
            'showCancelButton' => true,
            'cancelButtonColor' => '#d33',
            'onDismissed' => '',
            'cancelButtonText' => 'Cancelar',
            'confirmButtonText' => 'Deletar',
        ]);
    }

    public function delete()
    {

        Cliente::where('id', $this->cliente->id)->update([
            'status' => 'Deletado'
        ]);

        $this->alert('success', 'Cliente Deletado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        $clientes = Cliente::where('nome', 'like', '%' . $this->search . '%')
            ->where('status', 'Ativo')
            ->paginate(5);

        return view('livewire.clientes.clientes', ['clientes' => $clientes]);
    }
}
