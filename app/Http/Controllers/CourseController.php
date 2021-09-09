<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //CONTROL DE LA URL CURSOS
    public function index(){
        //RETORNO DE UNA VISTA
        return view('courses.index');
    }

}
