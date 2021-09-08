<x-app-layout>
    <section class="bg-cover bg-fixed" style="background-image: url({{ asset('img/home/home.jpg') }})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-bold text-4xl"> Domina Tus conocimientos con Cursos</h1>
                <p class="text-orange-500 text-lg mt-3">En Cursos Only Encontraras lo mejores cursos, manuales y
                    articulos que te ayudaran a convertir en un experto</p>

                <div class="mt-4 relative text-gray-600">
                    <input type="search" name="serch" placeholder="Buscar Curso"
                        class="w-full bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve" width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-24">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido1.jpg') }}"
                        alt="">
                </figure>

                <header>
                    <h1 class="text-center text-gray-700">Cursos y Productos</h1>
                </header>

                <p class="text-gray-500 text-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam
                    suscipit delectus aut obcaecati distinctio dolores, ut rerum enim commodi aliquam, quo voluptates
                    accusantium iure nulla rem aliquid doloremque voluptate.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido2.jpg') }}"
                        alt="">
                </figure>

                <header>
                    <h1 class="text-center text-gray-700">Examenes y Pruebas</h1>
                </header>
                <p class="text-gray-500 text-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam
                    suscipit delectus aut obcaecati distinctio dolores, ut rerum enim commodi aliquam, quo voluptates
                    accusantium iure nulla rem aliquid doloremque voluptate.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido3.jpg') }}"
                        alt="">
                </figure>

                <header>
                    <h1 class="text-center text-gray-700">Catalogos</h1>
                </header>
                <p class="text-gray-500 text-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam
                    suscipit delectus aut obcaecati distinctio dolores, ut rerum enim commodi aliquam, quo voluptates
                    accusantium iure nulla rem aliquid doloremque voluptate.</p>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{ asset('img/home/contenido4.jpg') }}"
                        alt="">
                </figure>

                <header>
                    <h1 class="text-center text-gray-700">Especialidades</h1>
                </header>
                <p class="text-gray-500 text-sm">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt ullam
                    suscipit delectus aut obcaecati distinctio dolores, ut rerum enim commodi aliquam, quo voluptates
                    accusantium iure nulla rem aliquid doloremque voluptate.</p>
            </article>
        </div>
    </section>


    <section class="mt-24 bg-gray-700 py-12">
        <h1 class="text-white text-center text-3xl">¿No sabes que cursos LLevar?</h1>
        <p class="text-center text-gray-100">Dirigase al Catalogo de Cursos y filtralos por categoria o niveles</p>
        <!-- component -->
        <div class="mt-4 flex justify-center">
            <a href="{{ route('courses.index') }}"
                class="bg-transparent hover:bg-blue text-blue-dark font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent rounded">
                Ir a los Cursos
            </a>
        </div>
    </section>


    <section class="mt-24">
        <h1 class="text-center text-xl text-gray-600">Ultimos Cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Los ultimos cursos subidos por tus docentes</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gag-y-8">
            {{-- Recorriendo los cursos --}}
            @foreach ($courses as $course)
                <article class="bg-white shadow-lg rounded overflow-hidden mb-10">
                    {{-- llamando la ruta de las imagenes almacenadas en la carpeta --}}
                    <img class="h-36 w-full object-cover" src=" {{ Storage::url($course->url) }}" alt="">

                    <div class="px-6 py-4"> {{-- para el limite de caracteres --}}
                        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{ Str::limit($course->title, 35) }}</h1>
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
                         {{--pasando el id del curso a la vista "course.show"--}}
                        <a href="{{ route('courses.show' , $course) }}"
                            class="block text-center w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-sm mt-4">
                            Ir a los Cursos
                        </a>
                    </div>
                </article>
            @endforeach
            {{-- end recorriendo los cursos --}}
        </div>
    </section>
</x-app-layout>
