<?php

namespace App\Livewire\Combos;

use App\Livewire\Forms\ComboForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Combos extends Component
{
    use LivewireAlert;

    public ComboForm $form;

    public function save()
    {
        $this->form->save();

        $this->dispatch('close-modal');

        $this->alert('success', 'Combo Criado!', [
            'position' => 'center',
            'timer' => 2000,
            'toast' => false,
            'text' => 'com sucesso',
        ]);

    }

    public function render()
    {
        return view('livewire.combos.combos');
    }
}
