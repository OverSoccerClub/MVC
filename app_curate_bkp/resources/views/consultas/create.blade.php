@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agendar Nova Consulta</h1>

    <form action="{{ route('consultas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="data_consulta">Data da Consulta</label>
            <input type="date" name="data_consulta" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="hora_consulta">Hora da Consulta</label>
            <input type="time" name="hora_consulta" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="Agendado">Agendado</option>
                <option value="Cancelado">Cancelado</option>
                <option value="Concluído">Concluído</option>
            </select>
        </div>

        <div class="form-group">
            <label for="medico_id">Médico</label>
            <select name="medico_id" class="form-control" required>
                @foreach($medicos as $medico)
                <option value="{{ $medico->id }}">{{ $medico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="paciente_id">Paciente</label>
            <select name="paciente_id" class="form-control" required>
                @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar
            </button>

            <!-- Botão Cancelar com ícone -->
            <a href="{{ route('consultas.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>  
    </form>
</div>
@endsection
