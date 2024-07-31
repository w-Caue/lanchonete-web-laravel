<?php

namespace App\Livewire\Funcionarios;

use App\Models\Funcionario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    #[Validate('required', message: 'O campo email não pode estar em branco.')]
    public $email;

    #[Validate('required', message: 'O campo senha estar em branco.')]
    public $password;

    public function login()
    {
        $funcionario = Funcionario::where('email', '=', $this->email)->get()->first();

        if ($funcionario != null && $this->email != null && $funcionario->email == $this->email) {

            if (Hash::check($this->password, $funcionario->password)) {
                Auth::login($funcionario, false);

                $this->alert('success', 'Login efetuado com sucesso!', [
                    'timer' => '2000',
                    'toast' => true,
                ]);

                return redirect()->route('admin.dashboard');
            } else {
                $this->alert('error', 'Senha incorreta!', [
                    'position' => 'center',
                    'timer' => '2000',
                    'toast' => true,
                ]);
            };
        } else {
            $this->alert('error', 'Informações inválidas!', [
                'position' => 'center',
                'timer' => '2000',
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.funcionarios.login');
    }
}
