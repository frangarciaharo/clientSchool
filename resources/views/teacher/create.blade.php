<x-layout>
    <x-slot:title>
        Dashboard: Crear Profesor
    </x-slot:title>

    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                    Crear Profesor
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
                        <input type="text" name="code" id="code" required placeholder="Ex: T-001"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="user_id" class="block text-sm font-semibold text-gray-600 mb-1">
                            Usuario Asociado
                        </label>
                        <select name="user_id" id="user_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                            @if($users->count() > 0)
                                <option value="" disabled selected>
                                    Selecciona un usuario
                                </option>
                                @foreach($users as $user)
                                    <option value="{{ $user['id'] }}">
                                        {{ $user['name'] }}
                                        {{ $user['lastname'] }}
                                        ({{ $user['email'] }})
                                    </option>
                                @endforeach
                            @else
                                <option value="" disabled selected>
                                    Usuarios no disponibles
                                </option>
                            @endif

                        </select>
                    </div>
                    <div>
                        <label for="course_code" class="block text-sm font-semibold text-gray-600 mb-1">
                            Courses
                        </label>
                        <select name="course_code" id="course_code" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                            <option value="" disabled selected>Selecciona un courses</option>
                            @foreach($courses as $course)
                                <option value="{{$course['codeCourse']}}">
                                    {{$course['namecourse']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex justify-end gap-3 pt-4">
                        <a href="/teachers"
                           class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow-md hover:shadow-lg transition">
                            Crear Profesor
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>