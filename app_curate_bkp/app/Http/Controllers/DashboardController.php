<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Consulta;
use App\Models\Especialidade;

class DashboardController extends Controller
{
    public function index()
    {
        // Contagem dos registros
        $pacientesCount = Paciente::count();
        $medicosCount = Medico::count();
        $consultasCount = Consulta::count();
        $especialidadesCount = Especialidade::count(); // Contagem das especialidades

        // Retorna a view da dashboard com as variáveis
        return view('dashboard', compact('pacientesCount', 'medicosCount', 'consultasCount', 'especialidadesCount'));
    }
}
