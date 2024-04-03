<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Funcionario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BarbeiroController extends Controller
{


    public function clientesMensais()
    {
        $userId = session('id');
        $mesAtual = Carbon::now();
        $mesAnterior = Carbon::now()->subMonth();
        $primeiroDiaMesAtual = Carbon::now()->startOfMonth();

        $funcionario = Funcionario::find($userId, ['valorCorteFuncionario', 'qntCortesFuncionario', 'salarioFuncionario']);


        // RECEITA

        $receitaMensal = Funcionario::where('id', $userId)
            ->whereBetween('created_at', [$primeiroDiaMesAtual, Carbon::now()])
            ->sum('valorCorteFuncionario');

        $valorMesAtual = Funcionario::where('id', $userId)
            ->whereBetween('created_at', [$mesAtual->startOfMonth(), $mesAtual->endOfMonth()])
            ->sum('valorCorteFuncionario');

        $valorMesAnterior = Funcionario::where('id', $userId)
            ->whereBetween('created_at', [$mesAnterior->startOfMonth(), $mesAnterior->endOfMonth()])
            ->sum('valorCorteFuncionario');


        if ($valorMesAnterior != 0) {
            $porcentagemReceita = ($valorMesAtual - $valorMesAnterior) / $valorMesAnterior * 100;
        } else {
            $porcentagemReceita = 0;
        }


        // CLIENTES

        $clienteMensais = Funcionario::where('id', $userId)
            ->whereBetween('created_at', [$primeiroDiaMesAtual, Carbon::now()])
            ->count();

        $clientesMesAnterior = Funcionario::where('id', $userId)
            ->whereBetween('created_at', [$mesAnterior->startOfMonth(), $mesAnterior->endOfMonth()])
            ->count();

        if ($clientesMesAnterior != 0) {
            $porcentagemCliente = ($clienteMensais - $clientesMesAnterior) / $clientesMesAnterior * 100;
        } else {
            $porcentagemCliente = 0;
        }


        // SALÁRIO 

        $salarioFuncionario = $funcionario->salarioFuncionario;
        $lucroMensal = $receitaMensal - $salarioFuncionario;

        $lucroMensalAnterior = $valorMesAnterior - $salarioFuncionario;

        if ($lucroMensalAnterior != 0) {
            $porcentagemLucro = ($lucroMensal - $lucroMensalAnterior) / $lucroMensalAnterior * 100;
        } else {
            $porcentagemLucro = 0;
        }

        // CORTES

        $qntCortesAnterior = Funcionario::where('id', $userId)
            ->whereBetween('created_at', [$mesAnterior->startOfMonth(), $mesAnterior->endOfMonth()])
            ->sum('qntCortesFuncionario');

        if ($qntCortesAnterior != 0) {
            $porcentagemCortes = ($funcionario->qntCortesFuncionario - $qntCortesAnterior) / $qntCortesAnterior * 100;
        } else {
            $porcentagemCortes = 0;
        }



        return view('dashboard/barbeiro/index', [
            'valorGerado' => $receitaMensal,
            'qntCortes' => $funcionario->qntCortesFuncionario,
            'clienteMensais' => $clienteMensais,
            'lucroMensal' => $lucroMensal,
            'porcentagemReceita' => $porcentagemReceita,
            'porcentagemCliente' => $porcentagemCliente,
            'porcentagemLucro' => $porcentagemLucro,
            'porcentagemCortes' => $porcentagemCortes
        ]);
    }




    public function index()
    {

        $idBarbeiro = session('id');

        $barbeiro = Funcionario::find($idBarbeiro);

        if (!$barbeiro) {
            abort('404', 'Barbeiro não encontrado');
        }

        return view('dashboard.barbeiro.index', compact('barbeiro'));
    }




    public function compromisso()
    {
        return view('dashboard.barbeiro.compromisso');
    }





    public function perfil()
    {
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
