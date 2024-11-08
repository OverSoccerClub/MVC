@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Novo Médico</h1>
    <form action="{{ route('medicos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="especialidade_id">Especialidade</label>
            <select name="especialidade_id" class="form-control" required>
                <option value="">Selecione a Especialidade</option>
                @foreach ($especialidades as $especialidade)
                    <option value="{{ $especialidade->id }}">{{ $especialidade->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="crm">CRM</label>
            <input type="text" name="crm" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Salvar
        </button>

        <!-- Botão Cancelar com ícone -->
        <a href="{{ route('medicos.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Cancelar
        </a>  

    </form>
</div>
@endsection
