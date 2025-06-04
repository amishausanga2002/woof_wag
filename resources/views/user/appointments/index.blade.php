<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    @livewireStyles


    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('/images/hero.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            position: relative;
            z-index: 0;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: -1;
        }
    </style>
</head>

<body class="text-white">


<nav class="bg-white bg-opacity-90 shadow-md text-black px-4 sm:px-8 py-4 flex justify-between items-center">
    <a href="{{ route('user.home') }}" class="text-2xl font-bold text-blue-600">WoofWag</a>

    <div class="flex items-center gap-6 text-sm font-medium">

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-semibold">Logout</button>
        </form>
    </div>
</nav>

<br><br><br><br>

<div class="max-w-5xl mx-auto px-6 py-10 bg-white bg-opacity-90 rounded shadow text-black">
    <h1 class="text-3xl font-bold mb-6 text-center">📅 Appointment Manager</h1>


    @livewire('appointment-manager')
</div>


<div class="text-center mt-8">
    <a href="{{ route('dashboard') }}">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow">
            ← Back to Dashboard
        </button>
    </a>
</div>

@livewireScripts
</body>
</html>
