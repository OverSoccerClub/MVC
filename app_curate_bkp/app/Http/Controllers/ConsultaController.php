<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = Consulta::with(['medico', 'paciente'])->get();
        return view('consultas.index', compact('consultas'));
    }

    public function create()
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('consultas.create', compact('medicos', 'pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data_consulta' => 'required|date',
            'hora_consulta' => 'required',
            'status' => 'required|in:Agendado,Cancelado,Concluído',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        Consulta::create($request->all());
        return redirect()->route('consultas.index')->with('success', 'Consulta agendada com sucesso.');
    }

    public function show(Consulta $consulta)
    {
        return view('consultas.show', compact('consulta'));
    }

    public function edit(Consulta $consulta)
    {
        $medicos = Medico::all();
        $pacientes = Paciente::all();
        return view('consultas.edit', compact('consulta', 'medicos', 'pacientes'));
    }

    public function update(Request $request, Consulta $consulta)
    {
        $request->validate([
            'data_consulta' => 'required|date',
            'hora_consulta' => 'required',
            'status' => 'required|in:Agendado,Cancelado,Concluído',
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
        ]);

        $consulta->update($request->all());
        return redirect()->route('consultas.index')->with('success', 'Consulta atualizada com sucesso.');
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();
        return redirect()->route('consultas.index')->with('success', 'Consulta deletada com sucesso.');
    }
}
