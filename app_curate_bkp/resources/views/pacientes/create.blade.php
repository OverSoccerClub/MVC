@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Cadastrar Novo Paciente</h1>

        <form action="{{ route('pacientes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" id="nome" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="data_nascimento">Data de Nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="endereco">Endereço</label>
                <textarea name="endereco" id="endereco" class="form-control" required></textarea>
            </div>

            <div class="form-group">
                <label for="email">Email (opcional)</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="cpf">CPF (opcional)</label>
                <input type="text" name="cpf" id="cpf" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i> Salvar
            </button>

            <!-- Botão Cancelar com ícone -->
            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancelar
            </a>  


        </form>
    </div>
@endsection
