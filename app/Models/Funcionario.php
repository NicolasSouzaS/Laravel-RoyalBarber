<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    // Campos editáveis no banco de dados - Processo do dashboard
    protected $fillable = [
        'nomeFuncionario',
        'sobrenomeFuncionario',
        'emailFuncionario',
        'especialidadeFuncionario',
        'inicioExpedienteFuncionario',
        'fimExpedienteFuncionario',
        'cargoFuncionario',
        'qntCortesFuncionario',
        'statusFuncionario',
    ];


    // Identificação de usuário - Processo do Login
    public function usuario(){
        return $this->morphOne(Usuario::class, 'tipo_usuario');
    }
}
