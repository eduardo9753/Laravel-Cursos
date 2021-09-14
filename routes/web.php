<?php

use Illuminate\Support\Facades\Route;

//IMPORTANDO HOMECONTROLLER PRINCIPAL
use App\Http\Controllers\HomeController;

//IMPORTANDO COURCECONTROLLER 
use App\Http\Controllers\CourseController;

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




/*******************************************RUTAS DE LOS CURSOS******************************/
//RUTA EN LA PAGINA HOME  "siempre se llama por el name(''), en la url se mostrara lo que dice el get('cursos')" 
Route::get('cursos', [CourseController::class, 'index'])->name('courses.index');

//RUTA CURSO POR ID DESDE LA PAGINA HOME "siempre se llama por el name(''), en la url se mostrara lo que dice el get('cursos')" 
Route::get('cursos/{course}',[CourseController::class, 'show'] )->name('courses.show');

//RUTA DE UN CURSO POR ID PARA SU MATRICULA 
//PREVIAMENTE AUTENTIFICADO "siempre se llama por el name(''), en la url se mostrara lo que dice el get('cursos')" 
Route::post('courses/{course}/enrolled',[CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');

Route::get('course-status/{course}', function ($id) {
    return "Control de tu avance";
})->name('course.status');

