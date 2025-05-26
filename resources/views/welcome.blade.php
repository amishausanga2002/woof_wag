<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoofWag</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
<body class="text-white h-screen w-full flex flex-col">

    <!-- Top Right Navigation -->
    <nav class="flex justify-end p-6">
        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="px-6 py-2 text-lg bg-white text-black rounded-md hover:bg-gray-200 transition"
            >
                Dashboard
            </a>
        @else
        <a
        href="{{ route('login') }}"
        class="px-6 py-2 text-lg bg-transparent border border-white hover:bg-white hover:text-black transition rounded-md mr-4"
    >
        Log in
    </a>

    @if (Route::has('register'))
        <a
            href="{{ route('register') }}"
            class="px-6 py-2 text-lg bg-transparent border border-white hover:bg-white hover:text-black transition rounded-md"
        >
            Register
        </a>

            @endif
        @endauth
    </nav>

    <!-- Centered Heading -->
    <div class="flex-grow flex flex-col items-center justify-center text-center -translate-y-10">
        <h1 class="text-5xl font-bold tracking-wide mb-2">Welcome to WoofWag</h1>
        <p class="text-xl text-white opacity-90">Bringing Joy to Every Pawstep.</p>
    </div>



</body>
</html>
