<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//MODELO COURSE
use App\Models\Course;

class HomeController extends Controller
{
    //
    public function __invoke()
    {
        //REGISTROS EN FORMA DESCENDENTE
        $cources = Course::where('status', '3')->latest('id')->get();
        return view('welcome' , compact('cources')); //mandando los datos a la vista
    }
}
