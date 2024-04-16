<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
    use HasFactory;

    protected $table = 'horarios';

    // Campos editáveis no banco de dados - Processo do dashboard
    protected $fillable = [
        'horarios'
    ];
}
