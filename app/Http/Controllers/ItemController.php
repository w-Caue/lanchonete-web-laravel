<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Item;
use App\Models\Tamanho;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $itens = Item::paginate(5);
        return view('item.index', ['itens' => $itens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tamanhos = Tamanho::all();
        $categorias = Categoria::all();

        return view('app.item.create', ['tamanhos' => $tamanhos, 'categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:200',
            'preco' => 'required',
            'imagem' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descricao deve ter no mínimo 5 caracteres',
            'descricao.max' => 'O campo descricao deve ter no máximo 200 caracteres'
        ];

        $request->validate($regras, $feedback);
       

        $item = new Item();
        $item->nome = $request->get('nome');
        $item->descricao = $request->get('descricao');
        $item->preco = $request->get('preco');
        $item->tamanho_id = $request->get('tamanho_id');
        $item->categoria_id = $request->get('categoria_id');

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $requestImagem = $request->imagem;

            $extension = $requestImagem->extension();

            $imagemName = md5($requestImagem->getClientOriginalName(). strtotime("now")). "." . $extension;

            $request->imagem->move(public_path("img/itens"), $imagemName);

            $item->imagem = $imagemName;
        } 

        $item->save();

        return redirect()->route('painel.item.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        $tamanhos = Tamanho::all();
        $categorias = Categoria::all();

        return view('app.item.edit', ['item' => $item,'tamanhos' => $tamanhos, 'categorias' => $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $item->update($request->all());

        return redirect()->route('painel.item.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }
}
