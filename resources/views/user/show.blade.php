<x-layout>
    <x-slot:title>
        Dashboard: Users
    </x-slot:title>

    <div class="h-220 bg-gray-100 flex flex-col gap-4 items-center justify-center p-6">
        <div class="w-full max-w-xl bg-white rounded-2xl shadow-md overflow-hidden">
            <div class="border-b px-6 py-4">
                <h1 class="text-lg font-semibold text-gray-800">
                    Detalle de la persona
                </h1>
                <p class="text-sm text-gray-500">
                    Información básica del usuario
                </p>
            </div>
            <div class="divide-y">
                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Nombre</span>
                    <span class="font-medium text-gray-900">{{$data['name']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Apellido</span>
                    <span class="font-medium text-gray-900">{{$data['lastname']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Email</span>
                    <span class="font-medium text-gray-900">{{$data['email']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">DNI</span>
                    <span class="font-medium text-gray-900">{{$data['dni']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Rol</span>
                    <span class="font-medium text-gray-900">{{$data['role']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Nacimiento</span>
                    <span class="font-medium text-gray-900">{{$data['birthdate']}}</span>
                </div>

                <div class="flex justify-between px-6 py-4">
                    <span class="text-gray-500">Curso</span>
                    <span class="font-medium text-gray-900">
                        {{$data['course'] ?? 'No asignado'}}
                    </span>
                </div>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="/users" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                Volver a Usuarios
            </a>
            <a href="/users/{{$data['id']}}/edit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded mt-4 inline-block">
                Editar Usuario
            </a>
        </div>
    </div>
</x-layout>