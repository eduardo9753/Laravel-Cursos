<x-app-layout>
    <section class="bg-cover bg-fixed" style="background-image: url({{ asset('img/home/home.jpg') }})">
        <div class="bg-opacity-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="font-bold text-4xl text-gray-300"> Domina Tus conocimientos con Cursos</h1>
                <p class="text-lg mt-3 text-gray-100">En Cursos Only Encontraras lo mejores cursos, manuales y
                    articulos que te ayudaran a convertir en un experto</p>

                {{-- LLAMANDO AL COMPONENTE DE BUSQUEDA --}}
                @livewire('search')
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
            <a href="{{ route('courses.index') }}" class="btn-primary p-3 rounded-sm">
                Ir a los Cursos
            </a>
        </div>
    </section>


    <section class="mt-24">
        <h1 class="text-center text-xl text-gray-600">Ultimos Cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Los ultimos cursos subidos por tus docentes</p>

        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gag-y-8">
            {{-- Recorriendo los cursos --}}
            @foreach ($courses as $course)
                {{-- Llamada del componente "resources/views/components/course-card-blade.php" --}}
                <x-course-card :course="$course"></x-course-card>
            @endforeach
            {{-- end recorriendo los cursos --}}
        </div>
    </section>
</x-app-layout>
