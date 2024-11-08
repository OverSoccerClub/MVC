<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    // Exibir a lista de médicos
    public function index(Request $request)
    {
        $query = Medico::query();
    
        // Verifica se há um termo de busca
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('id', $search)
                  ->orWhere('nome', 'like', "%{$search}%");
        }
    
        $medicos = $query->paginate(10); // Paginação opcional
    
        return view('medicos.index', compact('medicos'));
    }

    // Exibir o formulário de cadastro de um novo médico
    public function create()
    {
        $especialidades = Especialidade::all(); // Recupera todas as especialidades para o select
        return view('medicos.create', compact('especialidades'));
    }

    // Armazenar os dados do novo médico
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade_id' => 'required|exists:especialidades,id',
            'telefone' => 'required|string|max:15',
            'crm' => 'required|string|max:20|unique:medicos',
        ]);

        // Criar novo médico
        Medico::create([
            'nome' => $request->nome,
            'especialidade_id' => $request->especialidade_id,
            'telefone' => $request->telefone,
            'crm' => $request->crm,
        ]);

        // Redirecionar para a lista de médicos com mensagem de sucesso
        return redirect()->route('medicos.index')->with('success', 'Médico cadastrado com sucesso!');
    }

    // Exibir os detalhes de um médico específico
    public function show($id)
    {
        $medico = Medico::with('especialidade')->findOrFail($id); // Carrega a especialidade do médico
        return view('medicos.show', compact('medico'));
    }

    // Exibir o formulário de edição de um médico
    public function edit($id)
    {
        $medico = Medico::findOrFail($id);
        $especialidades = Especialidade::all(); // Recupera todas as especialidades
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    // Atualizar os dados de um médico existente
    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'especialidade_id' => 'required|exists:especialidades,id',
            'telefone' => 'required|string|max:15',
            'crm' => 'required|string|max:20|unique:medicos,crm,' . $id,
        ]);

        // Encontrar o médico e atualizar os dados
        $medico = Medico::findOrFail($id);
        $medico->update([
            'nome' => $request->nome,
            'especialidade_id' => $request->especialidade_id,
            'telefone' => $request->telefone,
            'crm' => $request->crm,
        ]);

        // Redirecionar para a lista de médicos com mensagem de sucesso
        return redirect()->route('medicos.index')->with('success', 'Médico atualizado com sucesso!');
    }

    // Excluir um médico da base de dados
    public function destroy($id)
    {
        $medico = Medico::findOrFail($id);
        $medico->delete();

        // Redirecionar para a lista de médicos com mensagem de sucesso
        return redirect()->route('medicos.index')->with('success', 'Médico excluído com sucesso!');
    }
}
