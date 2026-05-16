<x-layout>
    <x-slot:title>
        Sign Up
    </x-slot:title>

<div class="min-h-142 flex items-center justify-center bg-gradient-to-br from-slate-100 via-slate-200 to-slate-300 px-4">
    <div class="w-full max-w-md bg-blue-600 shadow-xl rounded-2xl p-6 border border-gray-200">
        <div class="flex flex-col gap-2">
            <button class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-lg py-2.5 bg-white hover:bg-blue-900 transition font-medium cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path fill="#4285f4" d="M17.64 9.2H9v3.48h4.84c-.21 1.12-.84 2.08-1.8 2.72v2.26h2.91c1.7-1.57 2.69-3.87 2.69-6.62z"/>
                    <path fill="#34a853" d="M9 18c2.43 0 4.47-.8 5.96-2.18l-2.91-2.26c-.81.54-1.84.86-3.05.86-2.34 0-4.33-1.58-5.04-3.71H.96v2.33C2.44 15.98 5.48 18 9 18z"/>
                    <path fill="#fbbc05" d="M3.96 10.71A5.4 5.4 0 0 1 3.68 9c0-.59.1-1.17.28-1.71V4.96H.96A9 9 0 0 0 0 9c0 1.45.35 2.83.96 4.04z"/>
                    <path fill="#ea4335" d="M9 3.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58C13.46.89 11.43 0 9 0 5.48 0 2.44 2.02.96 4.96L3.97 7.29C4.67 5.16 6.66 3.58 9 3.58z"/>
                </svg>
                <span>Register with Google</span>
            </button>
            <button class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-lg py-2.5 bg-white hover:bg-blue-900 transition font-medium cursor-pointer">
                <svg data-testid="geist-icon" height="16" stroke-linejoin="round" style="width:20;height:20;color:currentColor" viewBox="0 0 16 16" width="16"><g clip-path="url(#clip0_872_3147)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.57879 0 7.99729C0 11.5361 2.29 14.5251 5.47 15.5847C5.87 15.6547 6.02 15.4148 6.02 15.2049C6.02 15.0149 6.01 14.3851 6.01 13.7154C4 14.0852 3.48 13.2255 3.32 12.7757C3.23 12.5458 2.84 11.836 2.5 11.6461C2.22 11.4961 1.82 11.1262 2.49 11.1162C3.12 11.1062 3.57 11.696 3.72 11.936C4.44 13.1455 5.59 12.8057 6.05 12.5957C6.12 12.0759 6.33 11.726 6.56 11.5261C4.78 11.3262 2.92 10.6364 2.92 7.57743C2.92 6.70773 3.23 5.98797 3.74 5.42816C3.66 5.22823 3.38 4.40851 3.82 3.30888C3.82 3.30888 4.49 3.09895 6.02 4.1286C6.66 3.94866 7.34 3.85869 8.02 3.85869C8.7 3.85869 9.38 3.94866 10.02 4.1286C11.55 3.08895 12.22 3.30888 12.22 3.30888C12.66 4.40851 12.38 5.22823 12.3 5.42816C12.81 5.98797 13.12 6.69773 13.12 7.57743C13.12 10.6464 11.25 11.3262 9.47 11.5261C9.76 11.776 10.01 12.2558 10.01 13.0056C10.01 14.0752 10 14.9349 10 15.2049C10 15.4148 10.15 15.6647 10.55 15.5847C12.1381 15.0488 13.5182 14.0284 14.4958 12.6673C15.4735 11.3062 15.9996 9.67293 16 7.99729C16 3.57879 12.42 0 8 0Z" fill="currentColor"></path>
                    </g>
                    <defs>
                    <clipPath id="clip0_872_3147">
                    <rect width="16" height="16" fill="white"></rect>
                    </clipPath>
                    </defs>
                </svg>
                <span>Register with GitHub</span>
            </button>
        </div>
       

        <div class="flex items-center my-6">
            <div class="flex-grow h-px bg-white"></div>
            <span class="px-3 text-sm text-white">or</span>
            <div class="flex-grow h-px bg-white"></div>
        </div>
        <form method="POST" action="/register" class="space-y-5">
            @csrf

            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Name
                </label>

                <input type="text"
                    name="name"
                    placeholder="Ex: Jose Manuel"
                    value="{{ old('name') }}"
                    class="w-full rounded-lg border border-gray-300 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                    autofocus>

                @error('name')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    LastName
                </label>

                <input type="text"
                    name="lastname"
                    placeholder="Ex: Peŕez Peŕez"
                    value="{{ old('name') }}"
                    class="w-full rounded-lg border border-gray-300 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                    autofocus>

                @error('lastname')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    DNI
                </label>

                <input type="text"
                    name="dni"
                    placeholder="Ex: 12345678A"
                    value="{{ old('dni') }}"
                    class="w-full rounded-lg border border-gray-300 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                    autofocus>

                @error('dni')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    birthdate
                </label>

                <input type="date"
                    name="birthdate"
                    value="{{ old('birthdate') }}"
                    class="w-full rounded-lg border border-gray-300 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                    autofocus>

                @error('dni')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-white mb-1">
                    Email
                </label>

                <input type="email"
                    name="email"
                    placeholder="Ex: mail@example.com"
                    value="{{ old('email') }}"
                    class="w-full rounded-lg border border-gray-300 text-white px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required
                    autofocus>

                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <div class="flex justify-between items-center mb-1">
                    <label class="text-sm font-medium text-white">
                        Password
                    </label>
                </div>

                <input type="password"
                    name="password"
                    placeholder="••••••••"
                    class="w-full rounded-lg text-white border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>

                @error('password')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <a href="#" class="text-sm text-white hover:underline">
                    Forgot password?
                </a>
            </div>

            <label class="flex items-center gap-2 text-sm text-white cursor-pointer">
                <input type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-white focus:ring-blue-500">
                Remember me
            </label>

            <button type="submit"
                class="w-full bg-blue-400 text-white py-2.5 rounded-lg font-medium hover:bg-blue-900 transition cursor-pointer">
                Sign Up
            </button>
        </form>

        <p class="text-center text-white mt-6">
            You have an account?
            <a href="/register" class=" font-medium hover:underline">
                Sign In
            </a>
        </p>

    </div>
</div>

</x-layout>