<?php

namespace App\Policies;

use App\Models\User;
//MODELO COURSE
use App\Models\Course;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //METODO PARA VER SI UN ALUMNO SE ENCUENTRA MATRICULADO O NO
    public function enrolled(User $user, Course $course){
        //"students: METODO YA CREADO EL EL ARCHICO app/Models/Course.php"
        //RECUPERANOD TODOS LOS REGISTROS DE LOS USUARIOS QUE SE HAN MATRICULADO A ESE CURSO
        //constainst : verifica que el id del usuario esté en la coleccion de los cursos, si encuentra/true:false
        return $course->students->contains($user->id);
    }
}
