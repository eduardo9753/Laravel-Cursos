<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//MODELO COURSE
use App\Models\Course;

class HomeController extends Controller
{
    //RUTA INICIAL DEL APLICATIVO
    public function __invoke()
    {
        //REGISTROS EN FORMA DESCENDENTE Y LOS ULTIMOS 12
        //ESTA VARIABLE SE PASA A WELCOME, PERO EN WELCOMNE
        //SE ESTA UTILIZANDO UN COMPONENETE REUTILIZABLE
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);
        return view('welcome' , compact('courses')); //mandando los datos a la vista
    }
}
