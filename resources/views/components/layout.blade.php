<html>
    <head>
        <title>{{ env('APP_NAME') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    </head>
    <body class="bg-black">
        <header class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-md">
            <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
                
                <h1 class="text-2xl sm:text-3xl font-semibold text-white tracking-tight">
                    {{ env('APP_NAME') }}
                </h1>

                <nav class="flex items-center gap-6 text-sm font-medium">
                    <x-nav-link href="/" class="text-white/90 hover:text-white transition">
                        Dashboard
                    </x-nav-link>
                    <x-nav-link href="/login" class="text-white/90 hover:text-white transition">
                        Login
                    </x-nav-link>
                </nav>

            </div>
        </header>
        <main>
            {{ $slot }}
        </main>
    </body>
</html>