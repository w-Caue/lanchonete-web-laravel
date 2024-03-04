<?php

namespace App\Livewire\Pessoas;

use App\Models\Pessoa;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPessoas extends Component
{
    use WithPagination;

    use LivewireAlert;

    public $pessoa;

    protected $listeners = [
        'delete'
    ];

    public function dados()
    {
        $pessoas = Pessoa::select([
            'pessoas.id',
            'pessoas.nome',
            'pessoas.whatsapp',
            'pessoas.email',
            'pessoas.status',
            'pessoas.tipo_ecommerce',
        ]);

        return $pessoas->paginate(5);
    }

    public function remover(Pessoa $pessoa)
    {
        $this->pessoa = $pessoa;

        $this->alert('info', 'Deletar esse cadastro?', [
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
        Pessoa::where('id', $this->pessoa->id)->update([
            'status' => 'Excluido'
        ]);

        $this->alert('success', 'Cadastro Deletado!', [
            'position' => 'center',
            'timer' => '1000',
            'toast' => false,
        ]);
    }

    public function render()
    {
        return view('livewire.pessoas.listagem-pessoas', [
            'pessoas' => $this->dados()
        ]);
    }
}
