@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalhes do Paciente</h1>

        <div class="card">
            <div class="card-header">
                <h4>{{ $paciente->nome }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Data de Nascimento:</strong> {{ \Carbon\Carbon::parse($paciente->data_nascimento)->format('d/m/Y') }}</p>
                <p><strong>Telefone:</strong> {{ $paciente->telefone }}</p>
                <p><strong>Endereço:</strong> {{ $paciente->endereco }}</p>
                <p><strong>Email:</strong> {{ $paciente->email ? $paciente->email : 'Não informado' }}</p>
                <p><strong>CPF:</strong> {{ $paciente->cpf ? $paciente->cpf : 'Não informado' }}</p>
            </div>
            <div class="card-footer">
                <!-- Botão Voltar com ícone -->
                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Voltar
                </a>

                <!-- Botão Editar com ícone -->
                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Editar
                </a>

                <!-- Botão Excluir com ícone -->
                <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display: inline;">
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
