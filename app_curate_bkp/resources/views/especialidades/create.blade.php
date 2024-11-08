@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Cadastrar Nova Especialidade</h1>

    <form action="{{ route('especialidades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ old('nome') }}" required>
        </div>
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3">{{ old('descricao') }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Salvar
        </button>

        <!-- Botão Cancelar com ícone -->
        <a href="{{ route('especialidades.index') }}" class="btn btn-secondary">
            <i class="fas fa-times"></i> Cancelar
        </a>  
      </form>
</div>
@endsection
