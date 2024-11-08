<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    // Definir os campos que podem ser preenchidos em massa
    protected $fillable = ['nome', 'especialidade_id', 'telefone', 'crm'];

    // Relacionamento com o modelo Especialidade
    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class); // Um médico pertence a uma especialidade
    }
}
