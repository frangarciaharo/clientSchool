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
                <form action="/teachers/{{ $data['code'] }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="user_id" value="{{ $data['user']['id'] ?? '' }}">

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">
                            Codigo del Profesor
                        </label>
                        <input type="text" name="code_teacher" readonly
                            value="{{ $data['code'] }}"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">
                            Usuario Asociado
                        </label>
                        <div class="w-full px-4 py-2 border rounded-lg bg-gray-100">
                            {{ $data['user']['name'] }} {{ $data['user']['lastname'] }}
                            ({{ $data['user']['email'] }})
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-600 mb-1">
                            Cursos
                        </label>
                        <select name="course_code" class="w-full px-4 py-2 border rounded-lg">
                            <option value="">Seleccionar Curso</option>
                            @foreach($courses as $course)
                                <option value="{{ $course['codeCourse'] }}"
                                    {{ ($data['user']['course_code'] ?? null) == $course['codeCourse'] ? 'selected' : '' }}>
                                    {{ $course['namecourse'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="/teachers" class="px-5 py-2 bg-gray-200 rounded-lg">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 bg-indigo-600 text-white rounded-lg">
                            Guardar Profesor
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>