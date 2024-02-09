<?php

namespace App\Livewire\Encartes;

use App\Livewire\Forms\EncarteForm;
use Livewire\Component;

class Encarte extends Component
{
    public EncarteForm $form;

    public function mount(){
        $this->form->dataInicio = date('Y-m-d');
        $this->form->dataFinal = date('Y-m-d');
    }

    public function save(){
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
        return view('livewire.encartes.encarte');
    }
}
