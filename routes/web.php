<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ruta para mostrar el formulario de creación
Route::get('/leads/create', [LeadController::class, 'create']);

// Ruta para procesar el formulario de creación
Route::post('/leads', [LeadController::class, 'store']);

// Ruta para mostrar un lead específico
Route::get('/leads/{id}', [LeadController::class, 'show']);

// Ruta para mostrar el formulario de edición
Route::get('/leads/{id}/edit', [LeadController::class, 'edit']);

// Ruta para procesar el formulario de edición
Route::put('/leads/{id}', [LeadController::class, 'update']);

// Ruta para eliminar un lead
Route::delete('/leads/{id}', [LeadController::class, 'destroy']);