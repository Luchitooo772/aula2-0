<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AulaController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\MuebleController;
use App\Http\Controllers\FocoController;
use App\Http\Controllers\AireAcondicionadoController;
use App\Http\Controllers\CortinaController;
use App\Http\Controllers\AuthController;

// Página inicial: si está logueado va a Aulas, si no al Login
Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('aulas.index')
        : redirect()->route('login.form');
})->name('home');

// Auth: formularios y acciones
Route::get('/login',    [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login',   [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register',[AuthController::class, 'register'])->name('register');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas (solo usuarios logueados)
Route::middleware('auth')->group(function () {
    Route::resource('aulas', AulaController::class);
    Route::resource('docentes', DocenteController::class);
    Route::resource('materias', MateriaController::class);
    Route::resource('reservas', ReservaController::class);
    Route::resource('muebles', MuebleController::class);
    Route::resource('focos', FocoController::class);
    Route::resource('aires', AireAcondicionadoController::class);
    Route::resource('cortinas', CortinaController::class);
});
