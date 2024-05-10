<?php

namespace App\Livewire\Ecommerce\Pessoa;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Cliente extends Component
{
    use LivewireAlert;

    // #[Validate('min:3', message: 'This title is too short')]
    #[Validate('required', message: 'O campo nome não pode estar em branco.')]
    public $name;

    #[Validate('required', message: 'O campo email não pode estar em branco.')]
    public $email;

    public $phone;

    #[Validate('required', message: 'O campo senha estar em branco.')]
    public $password;

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('ecommerce.localizacao');
        }
    }

    public function login()
    {
        $user = User::where('email', '=', $this->email)->get()->first();

        if ($user != null && $this->email != null && $user->email == $this->email) {

            if (Hash::check($this->password, $user->password)) {
                Auth::login($user, false);

                $this->alert('success', 'Login efetuado com sucesso!', [
                    'timer' => '2000',
                    'toast' => true,
                ]);

                return redirect()->route('ecommerce.localizacao');
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

    public function register()
    {
        $this->validate();

        $usuario = User::where('email', '=', $this->email)->get()->first();

        if ($usuario == null) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => Hash::make($this->password),
            ]);

            if ($user) {
                Auth::login($user, false);

                $this->alert('success', 'Login efetuado com sucesso!', [
                    'timer' => '2000',
                    'toast' => true,
                ]);

                return redirect()->route('ecommerce.localizacao');
            }
        } else {
            $this->alert('info', 'O email já está sendo utilizado.', [
                'position' => 'center',
                'timer' => '2000',
                'toast' => true,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.pessoa.cliente');
    }
}
