<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class BarbeiroController extends Controller
{
    
    public function index(){

        $idFuncionario = session('id');

        $funcionario = Funcionario::find($idFuncionario);

        if(!$funcionario){
            abort('404', 'Cliente não encontrado');
        }

        return view('dashboard.barbeiro.index', compact('funcionario'));

    }


}
