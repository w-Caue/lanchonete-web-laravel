<?php

namespace App\Livewire\Admin\Auth;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    #[Validate('required')]
    public $usuario;

    #[Validate('required')]
    public $senha;

    public function loginAdmin()
    {
        $this->validate();

        $funcionario = Funcionario::where('nome', '=', $this->usuario)->get()->first();

        if ($funcionario == null) {
            return $this->alert('error', 'Informações inválidas!', [
                'position' => 'center',
                'timer' => '2000',
                'toast' => true,
            ]);
        }

        $senhaCorreta = Hash::check($this->password, $funcionario->password);

        if (!$senhaCorreta) {
            return $this->alert('error', 'Senha incorreta!', [
                'position' => 'center',
                'timer' => '2000',
                'toast' => true,
            ]);
        }

        Auth::guard('admin')->login($funcionario, false);

        return redirect()->route('admin.dashboard');
    }

    public function render()
    {
        $this->alert('error', 'Senha incorreta!', [
            'position' => 'center',
            'timer' => '2000',
            'toast' => true,
        ]);

        return view('livewire.admin.auth.login')->layout('layouts.admin.app');
    }
}
