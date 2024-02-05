<?php

namespace App\Livewire\Pessoas;

use App\Livewire\Forms\PessoaForm;
use App\Models\Pessoa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class Pessoas extends Component
{
    use LivewireAlert;

    use WithPagination;

    public PessoaForm $form;

    public $newCliente = false;

    public $search = '';
    public $cliente;

    protected $listeners = [
        'delete'
    ];


    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

        $this->alert('success', 'Cadastro Realizado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);

        $this->js('window.location.reload()');
    }

    public function editCliente(Pessoa $cliente)
    {
        $this->novoCliente();

        // $this->form->edit($cliente);
    }

    // public function update()
    // {
    //     $this->form->updateCliente();

    //     $this->alert('success', 'Cadastro Atualizado!', [
    //         'position' => 'center',
    //         'timer' => '1000',
    //         'toast' => false,
    //     ]);

    //     $this->fecharCliente();
    // }

    public function remover(Pessoa $cliente)
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

        Pessoa::where('id', $this->cliente->id)->update([
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
        $clientes = Pessoa::where('nome', 'like', '%' . $this->search . '%')
            ->where('status', 'Ativo')
            ->paginate(5);

        return view('livewire.pessoas.pessoas', ['clientes' => $clientes]);
    }
}
