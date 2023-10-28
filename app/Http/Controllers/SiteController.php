<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Pedido;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // $itens = Item::all();

        return view('pages.pedidos.create');
    }

    public function store(Pedido $pedido){
        $itens = Item::all();

        return view('pages.pedidos.create');
    }
}
