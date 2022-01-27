<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\NotasController;

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
Route::name('actas')->get('/actas', [PdfController::class, 'index']);
Route::name('show')->get('/acta/{id}',[PdfController::class,'show']);

 //Pagos y notas
Route::name('notas.index')->get('/notas',[NotasController::class,'index']);
//Route::name('guardarNotas')->post('/upload/{id}',[NotasController::class,'upload']);
//Route::name('mostrarNotas')->get('/notas/{id}',[NotasController::class,'mostrarNotas']); */