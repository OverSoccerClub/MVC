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
        <li class="breadcrumb-item active" aria-current="page">Agendamentos/Consultas</li>
    </ol>
</div>

<div class="content__wrap">
    <!-- Table with toolbar -->
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Agendamentos/Consultas Cadastrados</h5>

            <!-- Campo de busca -->
            <form action="{{ route('consultas.index') }}" method="GET" class="mb-4">
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
                            <th>Data</th>
                            <th>Hora</th>
                            <th>Status</th>
                            <th>Médico</th>
                            <th>Paciente</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultas as $consulta)
                        <tr>
                            <td>{{ str_pad($consulta->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ \Carbon\Carbon::parse($consulta->data_consulta)->format('d/m/y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($consulta->hora_consulta)->format('h:i A') }}</td>
                            <td>{{ $consulta->status }}</td>
                            <td>{{ $consulta->medico->nome }}</td>
                            <td>{{ $consulta->paciente->nome }}</td>

                            <td>
                                <!-- Botão para visualizar -->
                                <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Visualizar
                                </a>
                                
                                <!-- Botão para editar -->
                                <a href="{{ route('consultas.edit', $consulta->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                                
                                <!-- Botão para excluir -->
                                <form action="{{ route('consultas.destroy', $consulta->id) }}" method="POST" style="display:inline;">
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
                <a href="{{ route('consultas.create') }}" class="btn btn-primary mb-3">
                    <i class="fas fa-plus"></i> Novo
                </a>
            </div>
        </div>
    </div>
    <!-- END : Table with toolbar -->
</div>
@endsection
