<?php

namespace App\Livewire\Pessoas;

use App\Models\Pessoa;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class ListagemPessoas extends Component
{
    use WithPagination;

    use LivewireAlert;

    public $search;

    public $pessoa;

    protected $listeners = [
        'delete'
    ];

    public function dados()
    {
        $pessoas = User::select([
            'users.*',
        ])->where('access_level', '=', 'client')
            #Filtros
            ->when($this->search, function ($query) {
                return $query->where('name', 'LIKE', "%" . $this->search . "%");
            });

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
