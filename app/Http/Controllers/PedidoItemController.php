<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pedido;
use App\Models\PedidoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PedidoItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $itens = Item::all();
        
        return view('app.pedido.create', ['pedido' => $pedido, 'itens' => $itens]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
       
        $pedidoItem = new PedidoItem();
        $pedidoItem->pedido_id = $pedido->id;
        $pedidoItem->item_id = $request->get('item_id');
        $pedidoItem->save();

        return redirect()->route('painel.pedido-item.create', ['pedido' => $pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        $itens = Item::all();
        $pedido->itens;
        return view('app.pedido.show', ['pedido' => $pedido, 'itens' => $itens]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
