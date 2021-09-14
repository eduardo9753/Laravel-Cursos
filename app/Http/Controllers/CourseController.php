<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
//MODELO CURSO


class CourseController extends Controller
{
    //MATODO PARA LA VISTA PRINCIPAL DE LOS CURSOS
    public function index()
    {
        //RETORNO DE UNA VISTA
        return view('courses.index');
    }

    //METODO PARA MOSTRAR CURSOS POR ID
    public function show(Course $course)
    {
        //RETORNA LOS CURSOS SIMILARES DEL CUAL SE ESTA VIZUALIZANDO
        $similares = Course::where('category_id', $course->category_id)
                            ->where('id', '!=', $course->id)
                            ->where('status', 3)
                            ->latest('id')
                            ->take(5)
                            ->get();

        //RETORNO DE LA VISTA Y LA VARIABLE $course CON LOS DATOS DEL SLUG
        //no es necesario filtrar por slug ya que Laravel entiende la variavle del url
        return view('courses.show', compact('course', 'similares'));
    }

    //METODO PARA MATRICULARSE A UN CURSO POR ID
    public function enrolled(Course $course){
      //DEBEMOS DE CAPTURAR EL ID DEL "USUARIO/ESTUDIANTE" Y GUARDARLO EN LA TABLA INTERMEDIA EN LA BASE DE DATOS
      $course->students()->attach(auth()->user()->id);
      return redirect()->route('course.status', $course);
    }
}
