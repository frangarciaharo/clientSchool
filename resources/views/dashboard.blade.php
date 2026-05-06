<x-layout>
    <x-slot:title>
        Dashboard
    </x-slot:title>
    <div class="h-full bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto">

            <div class="mb-8">
                <h1 class="text-3xl font-semibold text-gray-800">Dashboard</h1>
                <p class="text-gray-500 text-sm">Acceso rápido a las secciones del sistema</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-8">

                <a href="/users" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-700 group-hover:text-indigo-600">
                            Usuarios
                        </h2>
                        <span class="material-symbols-outlined text-gray-400 group-hover:text-indigo-600">
                            group
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Administrar todos los usuarios
                    </p>
                </a>

                <a href="/teachers" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-700 group-hover:text-indigo-600">
                            Profesores
                        </h2>
                        <span class="material-symbols-outlined text-gray-400 group-hover:text-indigo-600">
                            school
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Ver y gestionar profesores
                    </p>
                </a>

                <a href="/students" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-700 group-hover:text-indigo-600">
                            Estudiantes
                        </h2>
                        <span class="material-symbols-outlined text-gray-400 group-hover:text-indigo-600">
                            person
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Acceso a la gestión de estudiantes
                    </p>
                </a>

                <a href="/courses" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-700 group-hover:text-indigo-600">
                            Cursos
                        </h2>
                        <span class="material-symbols-outlined text-gray-400 group-hover:text-indigo-600">
                            menu_book
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Buscar y gestionar cursos
                    </p>
                </a>
                 <a href="/subjects" class="group bg-white p-6 rounded-2xl shadow-sm hover:shadow-md transition">
                    <div class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-700 group-hover:text-indigo-600">
                            Asignaturas
                        </h2>
                        <span class="material-symbols-outlined text-gray-400 group-hover:text-indigo-600">
                            book
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 mt-2">
                        Buscar y gestionar asignaturas
                    </p>
                </a>

            </div>
        </div>
    </div>
</x-layout>