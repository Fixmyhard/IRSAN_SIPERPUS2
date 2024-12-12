<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perpustakaan Digital</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-gray-900 dark:text-gray-100">
        <div class="bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-100">
            <!-- Header -->
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-blue-500 selection:text-white">
                <div class="relative w-full max-w-4xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-4 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                                Selamat Datang di Perpustakaan Digital
                            </h1>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-gray-900 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-gray-900 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-gray-900 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-white"
                                        >
                                            Register
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>

                    <!-- Main Content -->
                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <a
                                href="{{ url('/books') }}"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-200 transition duration-300 hover:ring-gray-400 focus:outline-none focus-visible:ring-blue-500 dark:bg-gray-800"
                            >
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Daftar Buku</h2>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    Lihat koleksi buku yang tersedia di perpustakaan.
                                </p>
                            </a>

                            <a
                                href="{{ url('/borrowings') }}"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-lg ring-1 ring-gray-200 transition duration-300 hover:ring-gray-400 focus:outline-none focus-visible:ring-blue-500 dark:bg-gray-800"
                            >
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Riwayat Peminjaman</h2>
                                <p class="text-sm text-gray-700 dark:text-gray-300">
                                    Lihat daftar buku yang sedang Anda pinjam.
                                </p>
                            </a>
                        </div>
                    </main>

                    <!-- Footer -->
                    <footer class="py-16 text-center text-sm text-gray-600 dark:text-gray-400">
                        © 2024 Perpustakaan Digital. Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>
