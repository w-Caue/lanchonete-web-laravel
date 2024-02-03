<?php

namespace App\Livewire\Ecommerce\Localizacao;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Endereco extends Component
{
    public $cep;
    public $endereco = '';
    public $numero;
    public $complemento;
    public $referencia;
    public $bairro;
    public $cidade;

    public $localizacao = [];

    public function mount()
    {
        $this->localizacao = session()->get('localizacao');
        $this->atualizar();
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
        $local = array(
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'referencia' => $this->referencia,
            'bairro' => $this->bairro,
            'cidade' => $this->cidade,
        );

        array_push($this->localizacao, $local);

        session()->put('localizacao', $this->localizacao);
    }

    public function atualizar()
    {
        if ($this->localizacao == null)
            $this->localizacao = array();

        if ($this->localizacao != null) {
            foreach ($this->localizacao as $index => $item) {

                $this->cep = $this->localizacao[$index]['cep'];
                $this->endereco = $this->localizacao[$index]['endereco'];
                $this->numero = $this->localizacao[$index]['numero'];
                $this->complemento = $this->localizacao[$index]['complemento'];
                $this->referencia = $this->localizacao[$index]['referencia'];
                $this->bairro = $this->localizacao[$index]['bairro'];
                $this->cidade = $this->localizacao[$index]['cidade'];
            }
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.localizacao.endereco');
    }
}
