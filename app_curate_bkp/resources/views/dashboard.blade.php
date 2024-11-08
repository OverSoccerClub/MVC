@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            @auth
                <h1>Bem-vindo(a), {{ Auth::user()->name }}!</h1>
            @endauth
        </div>
    </div>

    <div class="row mt-4">
        <!-- Card - Pacientes -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-primary rounded shadow-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ícone maior -->
                        <i class="fas fa-users fa-4x mr-3"></i>
                        <div>
                            <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">Pacientes </h5>
                            <p class="card-text" style="font-size: 1.2rem;">{{ str_pad($pacientesCount, 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card - Médicos -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success rounded shadow-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ícone maior -->
                        <i class="fas fa-user-md fa-4x mr-3"></i>
                        <div>
                            <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">Médicos </h5>
                            <p class="card-text" style="font-size: 1.2rem;">{{ str_pad($medicosCount, 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card - Consultas -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning rounded shadow-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ícone maior -->
                        <i class="fas fa-calendar-check fa-4x mr-3"></i>
                        <div>
                            <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">Consultas Marcadas</h5>
                            <p class="card-text" style="font-size: 1.2rem;">{{ str_pad($consultasCount, 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card - Especialidades -->
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info rounded shadow-lg">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <!-- Ícone maior -->
                        <i class="fas fa-stethoscope fa-4x mr-3"></i>
                        <div>
                            <h5 class="card-title font-weight-bold" style="font-size: 1.25rem;">Especialidades</h5>
                            <p class="card-text" style="font-size: 1.2rem;">{{ str_pad($especialidadesCount, 3, '0', STR_PAD_LEFT) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
