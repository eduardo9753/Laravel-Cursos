<?php

use Illuminate\Support\Facades\Route;

//IMPORTANDO LA RUTA HOMECONTROLLER PRINCIPAL
use App\Http\Controllers\HomeController;


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
//LLAMA DEL CONTROLADOR HOME PRINCIPAL
Route::get('/', HomeController::class)->name('home');


//LLAMADA DEL DASHBOARD 
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//RUTA EN LA PAGINA HOME  "siempre se llama por el name(''), en la url se mostrara lo que dice el get('cursos')" 
Route::get('cursos', function () {
    return "Aqui se mostraran los cursos";
})->name('courses.index');


//MOSTRAR CURSO PO ID DESDE LA PAGINA HOME "siempre se llama por el name(''), en la url se mostrara lo que dice el get('cursos')" 
Route::get('cursos/{id}', function ($id) {
    return "Aqui se mostrar el curso";
})->name('courses.show');