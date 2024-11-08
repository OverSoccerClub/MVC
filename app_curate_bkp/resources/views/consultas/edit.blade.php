@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Consulta</h1>

    <form action="{{ route('consultas.update', $consulta) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="data_consulta">Data da Consulta</label>
            <input type="date" name="data_consulta" value="{{ $consulta->data_consulta }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="hora_consulta">Hora da Consulta</label>
            <input type="time" name="hora_consulta" value="{{ $consulta->hora_consulta }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Agendado" {{ $consulta->status == 'Agendado' ? 'selected' : '' }}>Agendado</option>
                <option value="Cancelado" {{ $consulta->status == 'Cancelado' ? 'selected' : '' }}>Cancelado</option>
                <option value="Concluído" {{ $consulta->status == 'Concluído' ? 'selected' : '' }}>Concluído</option>
            </select>
        </div>

        <div class="form-group">
            <label for="medico_id">Médico</label>
            <select name="medico_id" class="form-control" required>
                @foreach($medicos as $medico)
                <option value="{{ $medico->id }}" {{ $consulta->medico_id == $medico->id ? 'selected' : '' }}>
                    {{ $medico->nome }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" class="form-control" required>
                @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}" {{ $consulta->paciente_id == $paciente->id ? 'selected' : '' }}>
                    {{ $paciente->nome }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="card-footer">
            <!-- Botão Voltar com ícone -->
            <a href="{{ route('consultas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>

        </div>

    </form>
</div>
@endsection
