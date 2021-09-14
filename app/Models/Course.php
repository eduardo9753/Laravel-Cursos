<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'status'];

    /*
    *TODOS LOS METODOS QUE SE REALIZAN EN LOS MODELOS PUEDEN SER
     LLAMADOS DESDE LAS VISTAS SI SE INSTANCIO EN SU CONTROLADOR 
     CORRESPONDIENTE
    */


    /**
     * CON LAS RELACIONES CREADAS ABAJO
     * SE PUEDE ACCEDER A LOS CAMPOS DE LAS TABLAS 
     * INVESTIGAR LAS RELACION YA ESCRITAS ABAJO 
     * PARA MAS CONOCIMIENTO
     */

    //VER CANTIDAD DE ALUMNOS MATRICULADOS A LOS CURSOS
    protected $withCount = ['students', 'reviews'];

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    //METODO PARA VISUALIZAR LAS ESTRELLAS EN LA VISTA "welcome.blade.php"
    public function getRatingAttribute()
    {
        if ($this->reviews_count) { //si tienes calificaciones retorname
            return round($this->reviews->avg('rating'), 2);
        } else {                    //de los contrario 5 estrellas
            5;
        }
    }

    //QUERY SCOPES ACCESIBLE DESDE LA VISTA PARA REALIZAR RECORRIDOS CON FORAEACHT
    public function scopeCategory($query, $category_id)//RETORNA LAS CATEGORIAS
    {
        if ($category_id) {
            return $query->where('category_id', $category_id);
        }
    }

    public function scopeLevel($query, $level_id) //RETORNA LOS NIVELES
    {
        if ($level_id) {
            return $query->where('level_id', $level_id);
        }
    }
    
    //PARA GENERAR LOS SLUG
    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function requirements()
    {
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals()
    {
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences()
    {
        return $this->hasMany('App\Models\Audience');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    //Relacion uno a muchos inversa
    public function teachers()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function price()
    {
        return $this->belongsTo('App\Models\Level');
    }

    //Relacion muchos a muchos
    public function students()
    {
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a uno polimorfica
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relacion hasManyThrough
    public function lessons()
    {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }
}
