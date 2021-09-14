{{-- IMPORTANDO LA PLANTILLA PRINCIPAL --}}
<x-app-layout>
    {{-- PORTADAD --}}
    <section class="bg-cover bg-fixed" style="background-image: url({{ asset('img/cursos/cursos.jpg') }})">
        <div class="bg-opacity-5 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="font-bold text-4xl text-gray-100"> Los mejores Cursos para tus Conocimientos y en español</h1>
                <p class="text-lg mt-3 text-gray-100 bold">Ven y revisa las ultima tendencias medicas y escogelas</p>

                {{-- LLAMANDO AL COMPONENTE DE BUSQUEDA --}}
                @livewire('search')
            </div>
        </div>
    </section>

    {{-- LLAMANDO AL COMPONENTE LIVEWIRE QUE SE CREO ANTERIORMENTE --}}
    @livewire('course-index')
</x-app-layout>
