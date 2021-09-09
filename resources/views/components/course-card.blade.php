{{--VARIABLE COMO ATRIBUTO AL COMPONENTE--}}
@props(['course'])

<article class="card">
    {{-- llamando la ruta de las imagenes almacenadas en la carpeta --}}
    <img class="h-36 w-full object-cover" src=" {{ Storage::url($course->url) }}" alt="">

    <div class="card-body"> {{-- para el limite de caracteres --}}
        <h1 class="">{{ Str::limit($course->title, 35) }}</h1>
        <p class="text-red-700 mb-4">Profesor : {{ $course->teachers->name }}</p>

        <div class="flex">
            <ul class="flex text-sm">
                <li class="mr-1">
                    <i class=" fas fa-star text-{{ $course->rating >= 1 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class=" fas fa-star text-{{ $course->rating >= 2 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class=" fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class=" fas fa-star text-{{ $course->rating >= 3 ? 'yellow' : 'gray' }}-400"></i>
                </li>
                <li class="mr-1">
                    <i class=" fas fa-star text-{{ $course->rating == 5 ? 'yellow' : 'gray' }}-400"></i>
                </li>
            </ul>

            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users">
                    ({{ $course->students_count }})
                </i>
            </p>
        </div>
        {{-- pasando el id del curso a la vista "course.show" --}}
        <a href="{{ route('courses.show', $course) }}"
            class="btn-block mt-4 btn btn-primary">
            Ir a los Cursos
        </a>
    </div>
</article>
