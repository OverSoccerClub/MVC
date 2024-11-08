@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Paciente</h1>

        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" value="{{ $paciente->nome }}" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" value="{{ $paciente->data_nascimento }}" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" value="{{ $paciente->telefone }}" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <textarea name="endereco" id="endereco" class="form-control" required>{{ $paciente->endereco }}</textarea>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $paciente->email }}">
            </div>

            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ $paciente->cpf }}">
            </div>

            <div class="card-footer">
            <!-- Botão Voltar com ícone -->
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar Alterações
            </button>

        </div>

        </form>
    </div>
@endsection
