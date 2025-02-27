<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\BandejaController;
use App\Http\Controllers\BandejaTraumatologoController;

// Home/Welcome Route
Route::get('/', function () {
    return view('welcome');
})->name('inicio');

// Formulario Routes
Route::get('/evaluacion', [FormularioController::class, 'index'])->name('pagina.boton');
Route::get('/formulario', [FormularioController::class, 'formulario'])->name('formulario.evaluacion');
Route::post('/formulario', [FormularioController::class, 'guardarFormulario'])->name('formulario.guardar');

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
});