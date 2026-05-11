<x-layout>
    <x-slot:title>
        Dashboard: Students
    </x-slot:title>

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto px-4 flex flex-col items-center">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Estudiantes</h1>
                <p class="text-gray-500 text-sm mt-1">Gestión de los estudiantes</p>
                <a href="/students/create" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                    Agregar Alumno
                </a>
            </div>

            <div class="bg-white w-[900px] shadow-lg rounded-2xl overflow-hidden">

                @if(isset($data) && count($data) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">

                            <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                                <tr>
                                    <th class="px-6 py-4">Codigo</th>
                                    <th class="px-6 py-4">Nombre</th>
                                    <th class="px-6 py-4">Apellidos</th>
                                    <th class="px-6 py-4">Email</th>
                                    <th class="px-6 py-4">Curso</th>
                                    <th class="px-6 py-4 text-right">Acciones</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @foreach ($data as $item)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['code']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['user']['name']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['user']['lastname']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['user']['email']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            <a href="/courses/{{$item['user']['course_code']}}">
                                                {{$item['user']['course_code']}}
                                            </a>
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end gap-4 text-lg">

                                                <a href="/students/{{$item['code']}}" class="text-gray-400 hover:text-indigo-600 transition">
                                                    <span class="material-symbols-outlined">visibility</span>
                                                </a>

                                                <a href="/students/{{$item['code']}}/edit" class="text-gray-400 hover:text-green-600 transition">
                                                    <span class="material-symbols-outlined">edit</span>
                                                </a>

                                                  <form action="/students/{{$item['code']}}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition cursor-pointer">
                                                        <span class="material-symbols-outlined">delete</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-500">No existen estudiantes</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-layout>