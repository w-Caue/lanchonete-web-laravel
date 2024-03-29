<?php

namespace App\Livewire\Ecommerce\Pessoa;

use Livewire\Component;

class Cliente extends Component
{
    public $nome;

    public $whatsapp;

    public $email;

    public $cliente = [];

    public function mount()
    {
        $this->cliente = session()->get('cliente');
        $this->atualizar();
    }

    public function salvar()
    {
        $clienteEcommerce = array(
            'nome' => $this->nome,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
        );

        array_push($this->cliente, $clienteEcommerce);

        session()->put('cliente', $this->cliente);
    }

    public function atualizar()
    {
        if ($this->cliente == null)
            $this->cliente = array();

        if ($this->cliente != null) {
            foreach ($this->cliente as $index => $item) {

                $this->nome = $this->cliente[$index]['nome'];
                $this->whatsapp = $this->cliente[$index]['whatsapp'];
                $this->email = $this->cliente[$index]['email'];
            }
        }
    }

    public function render()
    {
        return view('livewire.ecommerce.pessoa.cliente');
    }
}
