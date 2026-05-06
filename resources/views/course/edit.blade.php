<x-layout>
    <x-slot:title>
        Dashboard: Editando Curso {{$data['namecourse']}}
    </x-slot:title>

    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                    Editando Curso
                </h1>
                <a href="/courses"
                   class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                    ← Volver a Cursos
                </a>
            </div>
    
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <form action="/courses/{{$data['codeCourse']}}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="code" class="block text-sm font-semibold text-gray-600 mb-1">
                            Codigo del Curso
                        </label>
                        <input type="text" name="code" id="code" required readonly class="w-full px-4 py-2 border border-gray-300 rounded-lg cursor-not-allowed" value="{{$data['codeCourse']}}">
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">
                            Nombre del Curso
                        </label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{$data['namecourse']}}">
                    </div>
                    <div>
                        <label for="acronym" class="block text-sm font-semibold text-gray-600 mb-1">
                            Acronimo del Curso
                        </label>
                        <input type="text" name="acronym" id="acronym" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{$data['acronym']}}">
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-600 mb-1">
                            Duración del Curso
                        </label>
                        <input type="number" name="duration" id="duration" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{$data['duration']}}">
                    </div>
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="/courses"
                           class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>

                        <button type="submit"class="cursor-pointer px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow-md hover:shadow-lg transition">
                            Guardar Curso
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>