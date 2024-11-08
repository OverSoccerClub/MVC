<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // Definir os campos preenchíveis (fillable)
    protected $fillable = [
        'nome',
        'data_nascimento',
        'telefone',
        'endereco',
        'email',
        'cpf',
    ];

    // Caso você queira proteger contra atribuição em massa
    // de campos como `_token` ou outros que não são parte do seu banco de dados,
    // pode adicionar explicitamente um array `$guarded` para bloquear qualquer tentativa
    // de atribuição em massa em campos não listados.
    // protected $guarded = ['_token']; 
}
