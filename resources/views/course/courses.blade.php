<x-layout>
    <x-slot:title>
        Dashboard: Courses
    </x-slot:title>

    <div class="min-h-screen bg-gray-100 py-8">
        <div class="max-w-3xl mx-auto">
            
            <div class="mb-6">
                <h1 class="text-3xl font-semibold text-gray-800">Courses</h1>
                <p class="text-gray-500 text-sm">Gestión de los cursos</p>
                <a href="/courses/create" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                    Agregar Curso
                </a>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6">
                
                @if(isset($data) && count($data) > 0)
                    <div class="space-y-4">
                        @foreach ($data as $item)
                            <div class="flex justify-between items-center p-4 border border-gray-200 rounded-xl hover:shadow-sm transition">

                                <div>
                                    <p class="text-sm text-gray-500">Course Code</p>
                                    <p class="text-lg font-medium text-gray-800">
                                        {{$item['codeCourse']}}
                                        <span class="text-indigo-500">({{$item['acronym']}})</span>
                                    </p>
                                </div>

                                <div class="flex items-center gap-4">
                                    <a href="/courses/{{$item['codeCourse']}}" class="flex items-center gap-2 text-indigo-600 hover:text-indigo-800 transition">
                                        <span class="material-symbols-outlined text-xl">visibility</span>
                                    </a>
                                    <a href="/courses/{{$item['codeCourse']}}/edit" class="flex items-center gap-2 text-indigo-600 hover:text-green-800 transition">
                                        <span class="material-symbols-outlined text-xl">edit</span>
                                    </a>
                                    <form action="/courses/{{$item['codeCourse']}}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-600 transition cursor-pointer">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                @else
                    <div class="text-center py-10">
                        <p class="text-gray-500">No hay cursos creados</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-layout>