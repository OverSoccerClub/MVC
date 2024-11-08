@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Médico</h1>
    <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" value="{{ $medico->nome }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="especialidade_id">Especialidade</label>
            <select name="especialidade_id" class="form-control" required>
                <option value="">Selecione a Especialidade</option>
                @foreach ($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}" {{ $medico->especialidade_id == $especialidade->id ? 'selected' : '' }}>{{ $especialidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" value="{{ $medico->telefone }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="crm">CRM</label>
            <input type="text" name="crm" value="{{ $medico->crm }}" class="form-control" required>
        </div>
        <div class="card-footer">
            <!-- Botão Voltar com ícone -->
            <a href="{{ route('medicos.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>

        </div>

    </form>
</div>
@endsection
