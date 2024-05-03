<?php

namespace App\Livewire\Ecommerce\Conta;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cadastro extends Component
{
    public $name;
    public $email;
    public $phone;

    public function data()
    {
        $cadastro = User::where('id', Auth::user()->id)->get()->first();

        $this->name = $cadastro->name;
        $this->email = $cadastro->email;
        $this->phone = $cadastro->phone;

        return;
    }

    public function atualizar(){
        User::findOrFail(Auth::user()->id)->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        return $this->js('window.location.reload()');
    }

    public function render()
    {
        return view('livewire.ecommerce.conta.cadastro', [
            'cadastro' => $this->data(),
        ]);
    }
}
