<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PdfController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Docentes
Route::resource('docentes', DocenteController::class);

// Estudiantes
Route::resource('estudiantes', EstudianteController::class);

//Proyectos
Route::resource('proyectos', ProyectoController::class);

//pdf
Route::name('imprimir')->get('/imprimir', [PdfController::class, 'imprimir']);