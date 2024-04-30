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

    public $entrega = true;
    public $localizacao;

    public function mount()
    {
        $this->localizacao = session()->get('entrega');

        if ($this->localizacao != null) {
            return redirect()->route('ecommerce.pagamento');
        }
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

        session()->put('entrega', $endereco->id);

        return redirect()->route('ecommerce.pagamento');
    }

    public function enderecos()
    {
        $user = Auth::user()->id;

        $this->enderecosUsers = ModelsEndereco::where('user_id', $user)->get();
    }

    public function enderecoSalvo($codigo)
    {
        $endereco = ModelsEndereco::where('id', $codigo)->get()->first();

        $this->dispatch('close-modal');

        $this->cep = $endereco->cep;
        $this->numero = $endereco->numero;
        $this->endereco = $endereco->endereco;
        $this->complemento = $endereco->complemento;
        $this->bairro = $endereco->bairro;
        $this->cidade = $endereco->cidade;
        $this->referencia = $endereco->referencia;

        $this->entrega = false;

        session()->put('entrega', $endereco->id);
    }

    public function render()
    {
        return view('livewire.ecommerce.localizacao.endereco');
    }
}
