@extends('layouts.app')

@section('content')

<div class="content__wrap">
    <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
            <a href="#">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Lista</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Médicos</li>
    </ol>
</div>

<div class="content__wrap">
    <!-- Table with toolbar -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Médicos Cadastrados</h5>

            <!-- Campo de busca -->
            <form action="{{ route('medicos.index') }}" method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Buscar por ID ou Nome">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Buscar
                    </button>
                </div>
            </form>

            <div class="table-responsive">
                <!-- Tabela de listagem -->
                <table class="table table-striped text-left">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Nome</th>
                            <th>Especialidade</th>
                            <th>CRM</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($medicos as $medico)
                        <tr>
                            <td>{{ str_pad($medico->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $medico->nome }}</td>
                            <td>{{ $medico->especialidade->nome }}</td>
                            <td>{{ $medico->crm }}</td>

                            <td>
                                <!-- Botão para visualizar -->
                                <a href="{{ route('medicos.show', $medico->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Visualizar
                                </a>
                                
                                <!-- Botão para editar -->
                                <a href="{{ route('medicos.edit', $medico->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                
                                <!-- Botão para excluir -->
                                <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="fas fa-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Botão para adicionar novo item -->
                <a href="{{ route('medicos.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Novo
                </a>
            </div>
        </div>
    </div>
    <!-- END : Table with toolbar -->
</div>
@endsection
