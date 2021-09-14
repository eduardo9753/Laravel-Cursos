<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class Search extends Component
{
    //VARIABLE PARA PODER VER EN LOS UL
    public $search = "";

    public function render()
    {
        return view('livewire.search');
    }

    //PROPIEDAD COMPUTADAD PARA MOSTRAR LOS CURSOS POR TITULO
    public function getResultsProperty()
    {
        return Course::where('title', 'LIKE', '%' . $this->search . '%')
                      ->where('status', 3)
                      ->take(8)
                      ->get();
    }
}
