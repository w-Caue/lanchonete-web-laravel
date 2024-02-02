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

    public function updatedCep()
    {
    
        $response = Http::get("https://viacep.com.br/ws/".$this->cep."/json");
        $response = $response->json();

        $this->endereco = $response['logradouro'];
        
        $this->complemento = $response['complemento'];
        $this->bairro = $response['bairro'];

    }

    public function salvar(){
        $local = array(
            'cep' => $this->cep,
            'endereco' => $this->endereco,
            'numero' => $this->numero,
            'complemento' => $this->complemento,
            'referencia' => $this->referencia,
            'bairro' => $this->bairro,
        );

        array_push($this->localizacao, $local);

        session()->put('localizacao', $this->localizacao);
    }

    public function render()
    {
        return view('livewire.ecommerce.localizacao.endereco');
    }
}
