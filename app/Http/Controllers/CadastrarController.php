<?php

namespace App\Http\Controllers;

use App\Models\Cadastrar;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CadastrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('site.cadastrar');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request)
    {
        $request->validate([
            'nomeCadastrar'         => 'nullable|string|max:100',
            'sobrenomeCadastrar'    => 'nullable|string|max:200',
            'emailCadastrar'        => 'nullable|email|max:250|unique:Usuario.emailCadastrar',
            'senhaCadastrar'        => 'nullable|string|max:255',
            'telefoneCadastrar'     => 'nullable|string|max:11',
            'enderecocadastrar'     => 'nullable|string|max:255'
        ]);

        $usuario = new Usuario();
        $cliente = new Cliente();

        $ultimoUsuario = Usuario::latest('id')->first();
        $ultimoId = $ultimoUsuario ? $ultimoUsuario->idUsuario : 0;

        $proximoId = $ultimoId + 1;

        $usuario->nomeUsuario = $request->input('nomeCadastrar');
        $cliente->nomeCliente = $request->input('nomeCadastrar');

        $usuario->sobrenomeUsuario = $request->input('sobrenomeCadastrar');
        $cliente->sobrenomeCliente = $request->input('sobrenomeCadastrar');

        $usuario->senhaUsuario = $request->input('senhaCadastrar');

        $usuario->emailUsuario = $request->input('emailCadastrar');
        $cliente->emailCliente = $request->input('emailCadastrar');

        $usuario->telefoneUsuario = $request->input('telefoneCadastrar');
        $cliente->telefoneCliente = $request->input('telefoneCadastrar');

        $usuario->enderecoUsuario = $request->input('enderecoCadastrar');
        $cliente->enderecoCliente = $request->input('enderecoCadastrar');

        $cliente->qtnCortesCliente = 0;
        $cliente->statusCliente = 'ativo';

        $usuario->tipoUsuario = 'cliente';
        $usuario->tipoUsuarioId = $proximoId;
        $usuario->tipoUsuarioType = 'cliente';
        $usuario->save();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cadastrar  $cadastrar
     * @return \Illuminate\Http\Response
     */
    public function show(Cadastrar $cadastrar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cadastrar  $cadastrar
     * @return \Illuminate\Http\Response
     */
    public function edit(Cadastrar $cadastrar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cadastrar  $cadastrar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cadastrar $cadastrar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cadastrar  $cadastrar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cadastrar $cadastrar)
    {
        //
    }
}
