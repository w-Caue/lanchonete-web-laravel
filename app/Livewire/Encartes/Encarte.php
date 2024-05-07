<?php

namespace App\Livewire\Encartes;

use App\Livewire\Forms\EncarteForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Encarte extends Component
{
    use LivewireAlert;

    public EncarteForm $form;

    public function mount(){
        $this->form->dataInicio = date('Y-m-d');
        $this->form->dataFinal = date('Y-m-d');
    }

    public function save(){
        $this->form->save();

        $this->dispatch('close-modal');

        $this->alert('success', 'Encarte Criado!', [
            'timer' => 2000,
            'toast' => true,
        ]);

       return redirect()->route('admin.produto.encarte.show', ['codigo' => $this->form->codigo]);
    }

    public function render()
    {
        return view('livewire.encartes.encarte');
    }
}
