<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }

    public function autenticar(Request $request)
    {

        $regras = [
            'email' => 'required|email',
            'password' => 'required|max:20'
        ];

        $msg = [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail informado não é válido!.',
            'password.required' => 'O campo de senha é obrigatório!'
        ];

        $request->validate($regras, $msg);

        $email = $request->get('email');
        $password = $request->get('password');

        $usuario = Usuario::where('email', $email)->first();

        if (!$usuario) {
            return back()->withErrors(['email' => 'O email informado não está cadastrado.']);
        }

        if ($usuario->senha != $password) {
            return back()->withErrors(['password' => 'Senha incorreta.']);
        }

        $tipoUsuario = $usuario->tipo_usuario;

        $tipo = null;

        session([
            'email' => $usuario->email,
        ]);


        // dd($tipoUsuario);

        if ($tipoUsuario instanceof Cliente) {
            $tipo = 'cliente';

            session([
                'id' => $tipoUsuario->id,
                'nome' => $tipoUsuario->nomeCliente,
                'cargo' => 'cliente',
            ]);

            return redirect()->route('cliente');
            // return redirect()->route('home');
        } elseif ($tipoUsuario instanceof Funcionario) {
            if ($tipoUsuario->cargoFuncionario == 'gerente') {



                session([
                    'id'    => $tipoUsuario->id,
                    'nome'  => $tipoUsuario->nomeFuncionario,
                    'cargo' => 'gerente'
                ]);

                return redirect()->route('gerente');

            } elseif ($tipoUsuario->cargoFuncionario == 'barbeiro') {
                $tipo = 'funcionario - barbeiro';

                session([
                    'id'    => $tipoUsuario->id,
                    'nome'  => $tipoUsuario->nomeFuncionario,
                    'cargo' => 'barbeiro'
                ]);

                return redirect()->route('barbeiro');
            }
            else{
                dd($tipoUsuario);
                echo 'TEM ALGO ERRADO!!!';
            }
        }
    }
}
