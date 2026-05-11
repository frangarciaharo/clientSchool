<x-layout>
    <x-slot:title>
        Dashboard: Editando Asignatura {{$data['namesubject']}}
    </x-slot:title>

    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                    Editando Asignatura
                </h1>
                <a href="/subjects"
                   class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                    ← Volver a Asignaturas
                </a>
            </div>
    
            <div class="bg-white shadow-xl rounded-2xl p-8">

                <form action="/subjects/{{ $data['code_subject'] }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="code" class="block text-sm font-semibold text-gray-600 mb-1">
                            Codigo de la Asignatura
                        </label>
                        <input type="text" name="code" id="code" required readonly class="w-full px-4 py-2 border border-gray-300 rounded-lg cursor-not-allowed" value="{{$data['code_subject']}}">
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">
                            Nombre de la Asignatura
                        </label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{$data['namesubject']}}">
                    </div>
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">
                            Profesor de la Asignatura
                        </label>

                        <section>
                            <select name="teacher_code" id="teacher_code" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                                @php
                                    $currentTeacher = $data['teacher']['code'] ?? null;
                                @endphp

                                <option value="">-- Sin asignar --</option>

                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher['code'] }}"
                                        @selected($currentTeacher === $teacher['code'])>

                                        {{ $teacher['user']['name'] }} {{ $teacher['user']['lastname'] }}

                                    </option>
                                @endforeach

                            </select>
                        </section>
                    </div>
                     <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">
                            Curso de la asignatura
                        </label>
                        <section>
                            <select name="course_code" id="course_code" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                                @foreach($courses as $course)
                                    <option value="{{ $course['codeCourse'] }}"
                                        {{ $course['codeCourse'] === $data['course']['codeCourse'] ? 'selected' : '' }}>
                                        {{ $course['namecourse'] }} ({{ $course['acronym'] }})
                                    </option>
                                @endforeach
                            </select>
                        </section>
                    </div>
                    <div>
                        <label for="duration" class="block text-sm font-semibold text-gray-600 mb-1">
                            Duración de la Asignatura
                        </label>
                        <input type="number" name="duration" id="duration" required class="w-full px-4 py-2 border border-gray-300 rounded-lg" value="{{$data['duration']}}">
                    </div>
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="/subjects"
                           class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>

                        <button type="submit"class="cursor-pointer px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow-md hover:shadow-lg transition">
                            Guardar Asignatura
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>