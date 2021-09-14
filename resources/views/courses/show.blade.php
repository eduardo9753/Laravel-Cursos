{{-- IMPORTANDO LA PLANTILLA PRINCIPAL --}}
<x-app-layout>
    <section class="bg-gray-700 py-12 mb-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{ Storage::url($course->image->url) }}" alt="">
            </figure>

            <div class="text-white">
                <h1 class="text-4xl">{{ $course->title }}</h1>
                <h2 class="text-xl mb-3">{{ $course->subtitle }}</h2>
                <p class="mb-2"><i class="fas fa-chart-line"></i> Nivel : {{ $course->level->name }}</p>
                <p class="mb-2"><i></i> Category : {{ $course->category->name }}</p>
                <p class="mb-2"><i class="fas fa-users"></i> Matriculados : {{ $course->students_count }}
                </p>
                <p><i class="far fa-star"></i> Calificacion : {{ $course->rating }}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card">
                <div class="card-body">
                    <h1 class="font-bold text-2xl mb-2">lo que aprenderas</h1>
                    {{-- ITERANDO LOS OBJETIVOS TODO SE MUESTRA EN FUNCION DE LAS RELACIONES YA HECHAS EN LOS MODELOS --}}
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i
                                    class="fas fa-check text-gray-600 mr-2">{{ $goal->name }}</i></li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section>
                <h1 class="font-fold text-3xl mb-2 p-2">Temario</h1>
                {{-- ITERANDO LAS SECCIONES TODO SE MUESTRA EN FUNCION DE LAS RELACIONES YA HECHAS EN LOS MODELOS --}}
                @foreach ($course->sections as $section)
                    {{-- CONDICIONAL PARA QUE LA PRIMERA LECCION SE VISUALIZE --}}
                    <article class="mb-4 shadow" @if ($loop->first)
                        x-data="{open : true }"
                    @else
                        x-data="{open : false }"
                @endif>

                <header class="border border-gray-200 px-4 cursor-pointer bg-gray-200" x-on:click="open = !open">
                    <h1 class="font-bold text-lg text-gray-600 p-1">{{ $section->name }}</h1>
                </header>

                <div class="bg-white py-2 px-4" x-show="open">
                    <ul class="grid grid-cols-1 gap-2">
                        {{-- ITERANDO LOS CONTENIDOS TODO SE MUESTRA EN FUNCION DE LAS RELACIONES YA HECHAS EN LOS MODELOS --}}
                        @foreach ($section->lessons as $lesson)
                            <li class="text-gray-700 text-base mb-2"><i
                                    class="fas fa-play-circle mr-2 text-gray-500"></i>{{ $lesson->name }}</li>
                        @endforeach
                    </ul>
                </div>
                </article>
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{ $requirement->name }}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl">Description</h1>
                <div class="text-gray-700 text-base">
                    {{ $course->description }}
                </div>
            </section>

        </div>

        <div class="order-1 lg:order-2">
            <section class="card">
                <div class="card-body">
                    <div class="flex items-center">
                        <img class="h-12 object-cover rounded-full shadow-lg"
                            src="{{ $course->teachers->profile_photo_url }}" alt="{{ $course->teachers->name }}">
                        <div class="ml-4">
                            <h1 class="text-gray-500 text-lg font-bold">Prof. {{ $course->teachers->name }}</h1>
                            <a class="text-blue-400 text-sm font-bold"
                                href="">{{ '@' . Str::slug($course->teachers->name, '') }}</a>
                        </div>
                    </div>

                    {{-- VERIFICANDO CON POLICIES LAS MATRICULAS DE LOS CURSOS PARA NO LLEVARLO OTRAVEZ"app/Policies/CoursePolity.php" --}}
                    @can('enrolled', $course){{-- DIGITALIZAMOS EL METODO DEL ARCHIVO CREADO CON POLICIES --}}
                        <a class="btn btn-danger btn-block mt-4" href="{{ route('course.status', $course) }}">Continuar con
                            el
                            curso</a>
                    @else
                        <form action="{{ route('courses.enrolled', $course) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-block mt-4" type="submit">Llevar este curso</button>
                        </form>

                    @endcan
                    {{--EN VERIFICACION DEL CURSO MATRICULADO--}}
                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                    <article class="flex mb-6"> {{-- RECUPERANDO LA IMAGEN DEL CURSO DATO DE ITERACION ControlCourse --}}
                        <img class="h-32 w-40 object-cover" src="{{ Storage::url($similar->image->url) }}" alt="">
                        <div class="ml-3">
                            <h1>
                                {{-- PARA MOSTRAR CIERTA CANTIDAD DE TEXTO --}}
                                <a href="{{ route('courses.show', $similar) }}"
                                    class="font-bold text-gray-500 mb-3">{{ Str::limit($similar->title, 40) }}</a>
                            </h1>
                            <div class="flex items-center"> {{-- FOTO DEL PROFESOR DATO DE ITERACION ControlCourse --}}
                                <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                    src="{{ $similar->teachers->profile_photo_url }}" alt=""> {{-- NOMBRE DEL PROFESOR DATO DE ITERACION ControlCourse --}}
                                <p class="text-gray-700 text-sm ml-2">{{ $similar->teachers->name }}</p>
                            </div>

                            <p><i class="fas fa-star mr-2"></i>{{ $similar->rating }}</p>
                        </div>
                    </article>
                @endforeach
            </aside>
        </div>
    </div>
</x-app-layout>
