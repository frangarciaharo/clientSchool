<x-layout>
    <x-slot:title>
        Dashboard: Crear Usuario
    </x-slot:title>

    <div class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 py-12">
        <div class="max-w-3xl mx-auto px-6">
            <div class="mb-8 text-center">
                <h1 class="text-4xl font-extrabold text-gray-800 mb-2">
                    Crear Usuario
                </h1>
                <a href="/users"
                   class="text-indigo-600 hover:text-indigo-800 font-medium transition">
                    ← Volver a Usuarios
                </a>
            </div>

            <div class="bg-white shadow-xl rounded-2xl p-8">

                <form action="/users" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-600 mb-1">
                            Nombre
                        </label>
                        <input type="text" name="name" id="name" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="lastname" class="block text-sm font-semibold text-gray-600 mb-1">
                            Apellidos
                        </label>
                        <input type="text" name="lastname" id="lastname" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-600 mb-1">
                            Email
                        </label>
                        <input type="email" name="email" id="email" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-600 mb-1">
                            Contraseña
                        </label>
                        <input type="password" name="password" id="password" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>
                    <div>
                        <label for="dni" class="block text-sm font-semibold text-gray-600 mb-1">
                            DNI
                        </label>
                        <input type="text" name="dni" id="dni" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div>
                        <label for="birthdate" class="block text-sm font-semibold text-gray-600 mb-1">
                            Fecha de Nacimiento
                        </label>
                        <input type="date" name="birthdate" id="birthdate" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none transition">
                    </div>

                    <div class="flex justify-end gap-3 pt-4">
                        <a href="/users"
                           class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition font-medium">
                            Cancelar
                        </a>

                        <button type="submit"
                                class="px-6 py-2 rounded-lg bg-indigo-600 text-white font-semibold hover:bg-indigo-700 shadow-md hover:shadow-lg transition">
                            Crear Usuario
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-layout>