<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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
    <div class="min-h-screen flex flex-col items-center justify-start px-4 py-8">
        <h1 class="text-4xl font-bold mb-6 text-center">🛍️ Product Manager</h1>

        <div class="w-full max-w-6xl bg-white/80 rounded-lg shadow p-6 text-gray-900">
            @livewire('product-manager')
        </div>
    </div>

    @livewireScripts
</body>
</html>
