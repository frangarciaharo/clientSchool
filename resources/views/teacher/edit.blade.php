<x-layout>
    <x-slot:title>
        Dashboard: Editando Profesor
    </x-slot:title>

    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                    Editando Profesor
                </h1>
                <a href="/teachers"
                   class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                    ← Volver a Profesores
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-2xl p-8">

                <form action="/teachers" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="code" class="block text-sm font-semibold text-gray-600 mb-1">
                            Codigo del Profesor
                        </label>
                        <input type="text" name="code" id="code" required readonly class="w-full px-4 py-2 border border-gray-300 rounded-lg cursor-not-allowed" value="{{$data['code']}}">
                    </div>
                    <div>
                        <label for="user" class="block text-sm font-semibold text-gray-600 mb-1">
                            Usuario Asociado
                        </label>
                        <input type="text" name="user" id="user" readonly value="{{$data['user']['name']}} {{$data['user']['lastname']}} ({{$data['user']['email']}})"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg cursor-not-allowed">
                    </div>
                    <div>
                        <label for="course" class="block text-sm font-semibold text-gray-600 mb-1">
                            Cursos
                        </label>
                        <select name="course" id="course" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                            <option value="">Seleccionar Curso</option>
                            <option value="1">Curso 1</option>
                        </select>
                    </div>
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="/teachers"
                           class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>

                        <button type="submit"class="cursor-pointer px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow-md hover:shadow-lg transition">
                            Guardar Profesor
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>