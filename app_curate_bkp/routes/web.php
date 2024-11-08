<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadeController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/


Route::get('/', function () {
    // Verifica se o usuário está autenticado
    if (Auth::check()) {
        return redirect()->route('dashboard'); // ou para outra página que você deseja
    }
    
    return redirect()->route('login'); // Redireciona para a página de login caso não esteja autenticado
});

// Rota protegida por autenticação
/*
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/



Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');


Route::middleware(['auth'])->group(function () {

    /*TODAS AS ROTAS DAS ESPECIALIDADES */
    // Rota para listar especialidades
    Route::get('/especialidades', [EspecialidadeController::class, 'index'])->name('especialidades.index');
    
    // Rota para exibir o formulário de criação de especialidade
    Route::get('/especialidades/create', [EspecialidadeController::class, 'create'])->name('especialidades.create');
    
    // Rota para armazenar a especialidade no banco de dados
    Route::post('/especialidades', [EspecialidadeController::class, 'store'])->name('especialidades.store');
    
    // Rota para exibir o formulário de edição de especialidade
    Route::get('/especialidades/{especialidade}/edit', [EspecialidadeController::class, 'edit'])->name('especialidades.edit');
    
    // Rota para atualizar a especialidade no banco de dados
    Route::put('/especialidades/{especialidade}', [EspecialidadeController::class, 'update'])->name('especialidades.update');
    
    // Rota para excluir uma especialidade
    Route::delete('/especialidades/{especialidade}', [EspecialidadeController::class, 'destroy'])->name('especialidades.destroy');

    // Rota para exibir os detalhes de uma especialidade
    Route::get('/especialidades/{especialidade}', [EspecialidadeController::class, 'show'])->name('especialidades.show');


    /* ##TODAS AS ROTAS DOS MÉDICOS## */

    // Rota para listar medicos
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
    
    // Rota para exibir o formulário de criação de medicos
    Route::get('/medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
    
    // Rota para armazenar a medicos no banco de dados
    Route::post('/medicos', [MedicoController::class, 'store'])->name('medicos.store');
    
    // Rota para exibir o formulário de edição de medicos
    Route::get('/medicos/{medico}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    
    // Rota para atualizar a medicos no banco de dados
    Route::put('/medicos/{medico}', [MedicoController::class, 'update'])->name('medicos.update');
    
    // Rota para excluir uma medicos
    Route::delete('/medicos/{medico}', [MedicoController::class, 'destroy'])->name('medicos.destroy');

    // Rota para exibir os detalhes de uma medicos
    Route::get('/medicos/{medico}', [MedicoController::class, 'show'])->name('medicos.show');


    /* ##TODAS AS ROTAS DOS PACIENTES## */

    // Rota para listar pacientes
    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    
    // Rota para exibir o formulário de criação de pacientes
    Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
    
    // Rota para armazenar a pacientes no banco de dados
    Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
    
    // Rota para exibir o formulário de edição de pacientes
    Route::get('/pacientes/{medico}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    
    // Rota para atualizar a pacientes no banco de dados
    Route::put('/pacientes/{medico}', [PacienteController::class, 'update'])->name('pacientes.update');
    
    // Rota para excluir uma pacientes
    Route::delete('/pacientes/{medico}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

    // Rota para exibir os detalhes de uma pacientes
    Route::get('/pacientes/{medico}', [PacienteController::class, 'show'])->name('pacientes.show');


    /* ##TODAS AS ROTAS DAS CONSULTAS## */

    // Rota para listar consultas
    Route::get('/consultas', [ConsultaController::class, 'index'])->name('consultas.index');

    // Rota para exibir o formulário de criação de consultas
    Route::get('/consultas/create', [ConsultaController::class, 'create'])->name('consultas.create');

    // Rota para armazenar a consulta no banco de dados
    Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');

    // Rota para exibir o formulário de edição de consultas
    Route::get('/consultas/{consulta}/edit', [ConsultaController::class, 'edit'])->name('consultas.edit');

    // Rota para atualizar a consulta no banco de dados
    Route::put('/consultas/{consulta}', [ConsultaController::class, 'update'])->name('consultas.update');

    // Rota para excluir uma consulta
    Route::delete('/consultas/{consulta}', [ConsultaController::class, 'destroy'])->name('consultas.destroy');

    // Rota para exibir os detalhes de uma consulta
    Route::get('/consultas/{consulta}', [ConsultaController::class, 'show'])->name('consultas.show');


});

// Rotas do Jetstream (login, registro, etc)
require __DIR__.'/auth.php';





