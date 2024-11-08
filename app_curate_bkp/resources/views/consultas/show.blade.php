@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalhes da Consulta</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>Consulta:</strong> {{ $consulta->id }}</p>
            <p><strong>Data:</strong> {{ $consulta->data_consulta }}</p>
            <p><strong>Hora:</strong> {{ $consulta->hora_consulta }}</p>
            <p><strong>Status:</strong> {{ $consulta->status }}</p>
            <p><strong>Médico:</strong> {{ $consulta->medico->nome }}</p>
            <p><strong>Paciente:</strong> {{ $consulta->paciente->nome }}</p>
        </div>
        <div class="card-footer">
                <!-- Botão Voltar com ícone -->
                <a href="{{ route('consultas.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>

                <!-- Botão Editar com ícone -->
                <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>

                <!-- Botão Excluir com ícone -->
                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display: inline;">
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
