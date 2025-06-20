<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- ✅ Livewire Styles -->
    @livewireStyles
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        {{-- ✅ Navigation Bar --}}
        @include('layouts.navigation')

        {{-- ✅ Optional Header --}}
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        {{-- ✅ Main Content --}}
        <main class="py-6">
            {{ $slot }}
        </main>
    </div>

    <!-- ✅ Livewire Scripts -->
    @livewireScripts
</body>
</html>
