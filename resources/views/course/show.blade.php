<x-layout>
    <x-slot:title>
        Dashboard: Curso {{$data['namecourse']}}
    </x-slot:title>

    @php
        $user = authUser();
    @endphp

    <div class="h-220 bg-gray-100 flex flex-col gap-4 items-center justify-center p-6">

        <div class="w-full max-w-xl bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="border-b px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-800">
                    Detalle del curso
                </h1>
            </div>

            <div class="divide-y">

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Codigo Curso</span>
                    <span class="font-medium text-gray-900">{{$data['codeCourse']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Nombre del curso</span>
                    <span class="font-medium text-gray-900">{{$data['namecourse']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">ACRONIMO</span>
                    <span class="font-medium text-gray-900">{{$data['acronym']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Duration</span>
                    <span class="font-medium text-gray-900">{{$data['duration']}} horas</span>
                </div>

            </div>
        </div>

        <div class="flex gap-2">

            <a href="/courses"
               class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4">
                Volver a cursos
            </a>

            @if($user && $user->role === 'admin')

                <a href="/courses/{{$data['codeCourse']}}/edit"
                   class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4">
                    Editar Curso
                </a>

                <form method="POST" action="/courses/{{$data['codeCourse']}}" class="inline">
                    @csrf
                    @method('DELETE')

                    <button class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded mt-4">
                        Eliminar
                    </button>
                </form>

            @endif

        </div>
    </div>
</x-layout>