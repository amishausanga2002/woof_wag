<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - User Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Background Styling -->
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

<!-- ✅ NAVBAR -->
<nav class="bg-white bg-opacity-90 shadow-md text-black px-4 sm:px-8 py-4 flex justify-between items-center">
    <a href="{{ route('user.home') }}" class="text-2xl font-bold text-blue-600">WoofWag</a>

    <div class="flex items-center gap-6 text-sm font-medium">


        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-semibold">Logout</button>
        </form>
    </div>
</nav>

<!-- ✅ DASHBOARD CONTENT -->
<div class="max-w-5xl mx-auto py-12 px-4">
    <h1 class="text-4xl font-bold mb-2 text-center">👤 Welcome to Your Dashboard</h1>

    <!-- ✅ User Greeting -->
    <p class="text-lg text-center mb-6 text-gray-100">
        Hello, <span class="font-semibold text-white">{{ Auth::user()->name }}</span> 👋
    </p>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        <!-- Go to Website -->
        <a href="{{ route('user.home') }}">
            <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow hover:shadow-lg text-black text-center">
                <h3 class="text-xl font-bold mb-2">🌐 Go to Webpage</h3>
                <p class="text-sm">Visit the public interface</p>
            </div>
        </a>

        <!-- My Orders -->
        <a href="{{ route('user.orders') }}">
            <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow hover:shadow-lg text-black text-center">
                <h3 class="text-xl font-bold mb-2">🧾 My Orders</h3>
                <p class="text-sm">View your purchase history</p>
            </div>
        </a>

        <!-- My Appointments -->
        <a href="{{ route('appointments.index') }}">
            <div class="bg-white bg-opacity-90 p-6 rounded-lg shadow hover:shadow-lg text-black text-center">
                <h3 class="text-xl font-bold mb-2">📅 My Appointments</h3>
                <p class="text-sm">Manage grooming & vet bookings</p>
            </div>
        </a>

    </div>
</div>


</body>
</html>
