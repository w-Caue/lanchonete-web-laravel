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

    public PessoaForm $form;

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

    public function render()
    {
        return view('livewire.pessoas.pessoas');
    }
}
