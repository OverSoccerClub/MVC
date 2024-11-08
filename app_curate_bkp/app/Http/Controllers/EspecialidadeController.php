<?php

namespace App\Http\Controllers;

use App\Models\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    public function index(Request $request)
    {
        $query = Especialidade::query();
    
        // Verifica se há um termo de busca
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('id', $search)
                  ->orWhere('nome', 'like', "%{$search}%");
        }
    
        $especialidades = $query->paginate(10); // Paginação opcional
    
        return view('especialidades.index', compact('especialidades'));
    }
    
    public function create()
    {
        // Exibe o formulário para criar uma nova especialidade
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        // Valida os dados e cria uma nova especialidade
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|max:500',
        ]);

        Especialidade::create($request->all());

        return redirect()->route('especialidades.index')
                         ->with('success', 'Especialidade criada com sucesso!');
    }

    public function show($id)
    {
        // Exibe os detalhes de uma especialidade
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.show', compact('especialidade'));
    }

    public function edit($id)
    {
        // Exibe o formulário para editar uma especialidade
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidade'));
    }

    public function update(Request $request, $id)
    {
        // Valida e atualiza a especialidade
        $request->validate([
            'nome' => 'required|max:255',
            'descricao' => 'nullable|max:500',
        ]);

        $especialidade = Especialidade::findOrFail($id);
        $especialidade->update($request->all());

        return redirect()->route('especialidades.index')
                         ->with('success', 'Especialidade atualizada com sucesso!');
    }

    public function destroy($id)
    {
        // Exclui a especialidade
        $especialidade = Especialidade::findOrFail($id);
        $especialidade->delete();

        return redirect()->route('especialidades.index')
                         ->with('success', 'Especialidade excluída com sucesso!');
    }
}
