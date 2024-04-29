<?php

namespace App\Livewire\Ecommerce\Localizacao;

use App\Models\Endereco as ModelsEndereco;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Endereco extends Component
{
    use LivewireAlert;

    public $cep;
    public $endereco = '';
    public $enderecosUsers = [];
    public $numero;
    public $complemento;
    public $referencia;
    public $bairro;
    public $cidade;

    public $retirada;
    public $localizacao;

    public function mount()
    {
    }

    public function updatedCep()
    {
        $response = Http::get("https://viacep.com.br/ws/" . $this->cep . "/json");
        $response = $response->json();

        $this->endereco = $response['logradouro'];
        $this->complemento = $response['complemento'];
        $this->bairro = $response['bairro'];
        $this->cidade = $response['localidade'];
    }

    public function salvar()
    {
        $user = Auth::user()->id;

        $endereco = ModelsEndereco::create([
            'user_id' => $user,
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'referencia' => $this->referencia,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
        ]);

        if ($endereco) {
            $this->alert('success', 'Seu endereço foi salvo!', [
                'position' => 'center',
                'timer' => 2000,
                'toast' => false,
            ]);
        }

        return redirect();
    }

    public function enderecos()
    {
        $user = Auth::user()->id;

        $this->enderecosUsers = ModelsEndereco::where('user_id', $user)->get();

    }

    public function render()
    {
        return view('livewire.ecommerce.localizacao.endereco');
    }
}
