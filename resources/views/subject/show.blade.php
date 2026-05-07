<x-layout>
    <x-slot:title>
        Dashboard: Asignatura {{$data['namesubject']}}
    </x-slot:title>

    <div class="h-220 bg-gray-100 flex flex-col gap-4 items-center justify-center p-6">
        <div class="w-full max-w-xl bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="border-b px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-800">
                    Detalle de la asignatura: {{$data['namesubject']}}
                </h1>
                <p class="text-sm text-gray-500">
                    Información básica de la asignatura
                </p>
            </div>
            <div class="divide-y">
                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Codigo de la asignatura</span>
                    <span class="font-medium text-gray-900">{{$data['code_subject']}}</span>
                </div>
                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Nombre de la asignatura</span>
                    <span class="font-medium text-gray-900">{{$data['namesubject']}}</span>
                </div>
                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Duration</span>
                    <span class="font-medium text-gray-900">{{$data['duration']}} horas</span>
                </div>
                <div>
                    <a href="/teachers/{{$data['teacher']['code']}}" class="flex justify-between px-6 py-4">
                        <span class="text-gray-500">Profesor</span>
                        <span class="font-medium text-gray-900">
                            @if($data['teacher']['code'])
                                {{$data['teacher']['user']['name']}} {{$data['teacher']['user']['lastname']}}
                            @else
                                No asignado
                            @endif
                        </span>
                    </a>
                </div>
                <div>
                    <a href="/courses/{{$data['course']['codeCourse']}}" class="flex justify-between px-6 py-4">
                        <span class="text-gray-500">Curso</span>
                        <span class="font-medium text-gray-900">{{$data['course']['acronym']}}</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="/subjects" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                Volver a asignaturas
            </a>
            <a href="/subjects/{{$data['code_subject']}}/edit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                Editar Asigatura
            </a>
        </div>
    </div>
</x-layout>