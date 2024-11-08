<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index(Request $request)
    {
        $query = Paciente::query();
    
        // Verifica se há um termo de busca
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('id', $search)
                  ->orWhere('nome', 'like', "%{$search}%");
        }
    
        $pacientes = $query->paginate(10); // Paginação opcional
    
        return view('pacientes.index', compact('pacientes'));
    }


    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|max:255',
            'endereco' => 'required|string',
            'email' => 'nullable|email|max:255',
            'cpf' => 'nullable|string|max:255',
        ]);

        Paciente::create($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente criado com sucesso!');
    }

    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show', compact('paciente'));
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'telefone' => 'required|string|max:255',
            'endereco' => 'required|string',
            'email' => 'nullable|email|max:255',
            'cpf' => 'nullable|string|max:255',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.index')->with('success', 'Paciente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.index')->with('success', 'Paciente excluído com sucesso!');
    }
}
