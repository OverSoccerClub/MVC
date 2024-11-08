@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Especialidade</h1>

    <form action="{{ route('especialidades.update', $especialidade->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $especialidade->nome }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ $especialidade->descricao }}</textarea>
        </div>
        <div class="card-footer">
            <!-- Botão Voltar com ícone -->
            <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>

        </div>
    </form>
</div>
@endsection
