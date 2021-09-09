<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day --}}
    <div class="bg-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <!--metodo del controlador "livewire/course-index.blade.php"-->
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4"
                wire:click="resetFilters">
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los Cursos
            </button>
            <!-- component -->
            <!-- Dropdown CATEGORIAS-->
            <!--varable con alpine.js-->
            <div class="relative mr-4" x-data="{ open: false}">
                <button
                    class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
                    x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach ($categories as $categorie)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                            wire:click="$set('category_id','{{ $categorie->id }}')"
                            x-on:click="open = false">{{ $categorie->name }}</a>
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown  NIVELES-->
            <!--varable con alpine.js-->
            <div class="relative" x-data="{ open: false}">
                <button
                    class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
                    x-on:click="open = true">
                    <i class="fab fa-accusoft mr-2 text-sm"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach ($levels as $level)
                        <a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                            wire:click="$set('level_id','{{ $level->id }}')"
                            x-on:click="open = false">{{ $level->name }}</a>
                    @endforeach
                    <!-- // Dropdown Body -->
                </div>
                <!-- // Dropdown -->
            </div>
        </div>

        {{-- LISTANDOS LOS CURSOS PAGINADOS DESDE EL CONTROLADOR "Livewire/CourseIndex.php" --}}
        <div
            class="mt-16 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gag-y-8">
            {{-- Recorriendo los cursos --}}
            @foreach ($courses as $course)
                {{-- Llamada del componente "resources/views/components/course-card-blade.php" --}}
                <x-course-card :course="$course"></x-course-card>
            @endforeach
            {{-- end recorriendo los cursos --}}
        </div>

        {{-- PAGINACION DE LARAVEL POR DEFECTO --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-4">
            {{ $courses->links() }}
        </div>
    </div>
