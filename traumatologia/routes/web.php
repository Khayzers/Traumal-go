<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\BandejaController;
use App\Http\Controllers\BandejaTraumatologoController;
use App\Http\Controllers\BandejaTecnologoController;
use App\Http\Controllers\BandejaAdministradorController;
use App\Http\Controllers\TraumatologosController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamenController;

// Home/Welcome Route
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Dashboard Route
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Formulario Routes
Route::get('/evaluacion', [FormularioController::class, 'index'])->name('pagina.boton');
Route::get('/formulario', [FormularioController::class, 'formulario'])->name('formulario.evaluacion');
Route::post('/formulario', [FormularioController::class, 'guardarFormulario'])->name('formulario.guardar');

Route::get('/traumatologos', [TraumatologosController::class, 'index'])->name('traumatologos');

// Bandeja Routes
Route::prefix('bandeja')->group(function () {
    // Centro Bandeja Routes
    Route::get('/', [BandejaController::class, 'index'])->name('bandeja.solicitudes');
    Route::get('/aprobar/{id}', [BandejaController::class, 'aprobar'])->name('bandeja.aprobar');
    Route::get('/rechazar/{id}', [BandejaController::class, 'rechazar'])->name('bandeja.rechazar');
    
    // Traumatologo Bandeja Routes
    Route::get('/traumatologo', [BandejaTraumatologoController::class, 'index'])->name('bandeja.traumatologo');
    Route::get('/traumatologo/revisar/{id}', [BandejaTraumatologoController::class, 'revisar'])->name('bandeja.traumatologo.revisar');
    Route::get('/traumatologo/contactar/{id}', [BandejaTraumatologoController::class, 'contactar'])->name('bandeja.traumatologo.contactar');
    
    // Tecnologo Bandeja Routes
    Route::get('/tecnologo', [BandejaTecnologoController::class, 'index'])->name('bandeja.tecnologo');
    Route::get('/tecnologo/subir/{id}', [BandejaTecnologoController::class, 'subirInforme'])->name('bandeja.tecnologo.subir');
    Route::post('/tecnologo/guardar-informe', [BandejaTecnologoController::class, 'guardarInforme'])->name('bandeja.tecnologo.guardar');

    // Administrador Bandeja Routes
    Route::get('/administrador', [BandejaAdministradorController::class, 'index'])->name('bandeja.administrador');
    Route::get('/administrador/usuarios', [BandejaAdministradorController::class, 'usuarios'])->name('bandeja.administrador.usuarios');
    Route::get('/administrador/estadisticas', [BandejaAdministradorController::class, 'estadisticas'])->name('bandeja.administrador.estadisticas');
});

Route::get('/examenes/orden/{id}', [ExamenController::class, 'mostrarOrden'])->name('examenes.orden');
Route::get('/examenes/pdf/{id}', [ExamenController::class, 'mostrarPDF'])->name('examenes.pdf');

// Admin Route para compatibilidad
Route::get('/admin', function () {
    return redirect()->route('bandeja.administrador');
})->name('admin');