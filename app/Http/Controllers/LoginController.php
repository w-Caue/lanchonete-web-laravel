<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'email' => 'required|email',
            'senha' => 'required|min:3|max:12'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Coloque um email válido',
            'senha.min' => 'Senha tem que conter mais de 3 caracteres',
            'senha.max' => 'Senha tem que conter menos de 12 caracteres',
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('email');
        $password = $request->get('senha');

        $cliente = Cliente::where('email', $email)->where('password', $password)->get()->first();

        echo $cliente;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
