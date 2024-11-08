@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes do Médico: {{ $medico->nome }}</h1>

    <div class="card">
        <div class="card-header">
            Informações do Médico
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $medico->nome }}</p>
            <p><strong>Especialidade:</strong> {{ $medico->especialidade->nome }}</p>
            <p><strong>Telefone:</strong> {{ $medico->telefone }}</p>
            <p><strong>CRM:</strong> {{ $medico->crm }}</p>
            <p><strong>Criado em:</strong> {{ $medico->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Atualizado em:</strong> {{ $medico->updated_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="card-footer">
                <!-- Botão Voltar com ícone -->
                <a href="{{ route('medicos.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>

                <!-- Botão Editar com ícone -->
                <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>

                <!-- Botão Excluir com ícone -->
                <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir?')">
                        <i class="fas fa-trash"></i> Excluir
                    </button>
                </form>
            </div>

    </div>
</div>
@endsection
