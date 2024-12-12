<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IRSAN SIPERPUS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- code untuk ngelink ke animasi --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/css/animations.css', 'resources/js/app.js'])
@endif



   
</head>
<body class="font-sans antialiased dark:bg-gray-900 dark:text-white">
    <div class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen flex flex-col items-center justify-center">
        <!-- Header -->
        <header class="mb-10 text-center">
            <h1 class="text-5xl font-sans">
                <span class="block slide-in-left">Welcome to</span>
                <span class="block slide-in-bottom text-7xl">IRSAN</span>
                <span class="block slide-in-right">SIPERPUS</span>
            </h1>
            <p class="mt-4 text-lg text-gray-600 dark:text-gray-400">Sistem Informasi Perpustakaan</p>
        </header>

        <!-- Buttons -->
        <div class="flex space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        Dashboard
                    </a>
                @else

                <span class="block slide-in-left">
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
                        Login
                    </a>
                </span>
                    

                <span class="block slide-in-right">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-lg shadow hover:bg-gray-400">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
                </span>
                    
        </div>
    </div>
</body>
</html>
