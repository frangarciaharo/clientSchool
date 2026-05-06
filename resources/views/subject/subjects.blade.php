<x-layout>
    <x-slot:title>
        Dashboard: Asignaturas
    </x-slot:title>

    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-5xl mx-auto px-4 flex flex-col items-center">
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800">Asignaturas</h1>
                <p class="text-gray-500 text-sm mt-1">Gestión de asignaturas</p>
            </div>

            <div class="bg-white w-[800px] shadow-lg rounded-2xl overflow-hidden">

                @if(isset($data) && count($data) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-600">

                            <thead class="bg-gray-50 text-xs uppercase text-gray-500">
                                <tr>
                                    <th class="px-6 py-4">Codigo</th>
                                    <th class="px-6 py-4">Nombre</th>
                                    <th class="px-6 py-4">Duration</th>
                                    <th class="px-6 py-4">Profesor</th>
                                    <th class="px-6 py-4">Curso</th>
                                    <th class="px-6 py-4 text-right">Acciones</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                                @foreach ($data as $item)
                                    <tr class="hover:bg-gray-50 transition">

                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['code_subject']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['namesubject']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['duration']}}
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            @if($item['teachercode'])
                                                 {{$item['teachercode']}}
                                            @else
                                                No asignado
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{$item['course']['acronym']}}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex justify-end gap-4 text-lg">

                                                <a href="#" class="text-gray-400 hover:text-indigo-600 transition">
                                                    <span class="material-symbols-outlined">visibility</span>
                                                </a>

                                                <a href="#" class="text-gray-400 hover:text-green-600 transition">
                                                    <span class="material-symbols-outlined">edit</span>
                                                </a>

                                                <a href="#" class="text-gray-400 hover:text-red-600 transition">
                                                    <span class="material-symbols-outlined">delete</span>
                                                </a>

                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-500">No users available</p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-layout>