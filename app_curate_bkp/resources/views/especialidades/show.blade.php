@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Especialidade: {{ $especialidade->nome }}</h1>

    <div class="card">
        <div class="card-header">
            Informações da Especialidade
        </div>
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $especialidade->nome }}</p>
            <p><strong>Descrição:</strong> {{ $especialidade->descricao }}</p>
        </div>
        <div class="card-footer">
                <!-- Botão Voltar com ícone -->
                <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>

                <!-- Botão Editar com ícone -->
                <a href="{{ route('especialidades.edit', $especialidade->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>

                <!-- Botão Excluir com ícone -->
                <form action="{{ route('especialidades.destroy', $especialidade->id) }}" method="POST" style="display: inline;">
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
