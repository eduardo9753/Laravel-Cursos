<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Level;
use App\Models\Course;
use Livewire\Component;

//PARA LA PAGINACION INSTACTA
use Livewire\WithPagination;

class CourseIndex extends Component
{
    use WithPagination;
    
    public $category_id =1;
    public $level_id = 1;

    public function render()
    {
        //MOSTRANDO LOS CURSOS CON PAGINACION Y POR CATEGORIA Y LEVEL
        $courses = Course::where('status',3)
                        ->category($this->category_id)
                        ->level($this->level_id)
                        ->latest('id')
                        ->paginate(4);
        //TRAENDO LAS CATEGORIAS
        $categories = Category::all();
        //TRAENDO LOS NIVELES
        $levels = Level::all();

        return view('livewire.course-index', compact('courses', 'categories','levels'));
    }

    public function resetFilters(){
        $this->reset(['category_id','level_id']);
    }
}
