<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\FormaDePagamento;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);

        return view('pedidos.index', ['pedidos' => $pedidos, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        $formasDePagamentos = FormaDePagamento::all();
        return view('app.pedido.create', ['clientes' => $clientes, 'formasDePagamentos' => $formasDePagamentos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'cliente_id' => 'exists:clientes,id'
        ];

        $feedback = [
            'exists' => 'Cliente informado não existe'
        ];

        $request->validate($regras, $feedback);

        $pedido = new Pedido();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->forma_de_pagamento_id = $request->get('forma_pagamento_id');
        $pedido->status = $request->get('status');
        $pedido->save();

        return redirect()->route('painel.pedido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
