<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class BarbeiroController extends Controller
{

    public function index(){

        $idBarbeiro = session('id');

        $barbeiro = Funcionario::find($idBarbeiro);

        if(!$barbeiro){
            abort('404', 'Barbeiro não encontrado');
        }

        return view('dashboard.barbeiro.index', compact('barbeiro'));

    }




    public function compromisso(){
        return view('dashboard.barbeiro.compromisso');

    }





    public function perfil(){
        return view('dashboard.barbeiro.perfil');

    }

    public function edit($id)
    {

        $idBarbeiro = session('id');
        $barbeiro = Funcionario::find($id);



        return view('dashboard/barbeiro/edit', compact('barbeiro'));
    }

    public function update(Request $request, $id)
    {

        $request->merge(['created_at' => now()]);

        $request->validate([
            'fotoFuncionario'           => 'required|string|max:255',
            'nomeFuncionario'           => 'required|string|max:100',
            'sobrenomeFuncionario'      => 'required|string|max:200',
            'numeroFuncionario'         => 'required|number|max:11',
            'emailFuncionario'          => 'required|email|max:255',
        ]);

        $func = Funcionario::findOrFail($id);

        $func->update($request->only([
            'fotoFuncionario',
            'nomeFuncionario',
            'sobrenomeFuncionario',
            'numeroFuncionario',
            'emailFuncionario',
        ]));

        return redirect()->route('barbeiro.perfil')->with('success', 'Perfil atualizado com sucesso');
    }


}
