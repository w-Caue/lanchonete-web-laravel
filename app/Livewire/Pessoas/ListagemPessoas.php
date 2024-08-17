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

    public $load = false;

    // Filtros tabela
    public $sortFilter = 'name';

    public $sortAsc = true;

    public $search;

    public $pessoa;

    protected $listeners = [
        'delete'
    ];

    public function sortBy($field)
    {
        if ($this->sortFilter === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortFilter = $field;
    }

    public function load()
    {
        $this->load = true;
    }

    public function dados()
    {
        $pessoas = User::select([
            'users.*',
        ])->where('access_level', '=', 'client')
            #Filtros
            ->when(!empty($this->search), function ($query) {
                return $query->where($this->sortFilter, 'LIKE', "%" . $this->search . "%");
            })
            ->orderBy($this->sortFilter, $this->sortAsc ? 'ASC' : 'DESC');

        return $pessoas->paginate(5);
    }

    public function remover(User $pessoa)
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
        User::where('id', $this->pessoa->id)->update([
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
