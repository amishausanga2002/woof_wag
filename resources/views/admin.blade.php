<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

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
        <a href="{{ route('admin') }}" class="text-2xl font-bold text-blue-600">WoofWag</a>
        {{-- <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-semibold">Logout</button>
        </form> --}}
    </nav>

    <!-- ✅ Main Content -->
    <main class="flex flex-col items-center justify-center min-h-screen px-6">
        <h1 class="text-4xl font-bold mb-10">Admin Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full max-w-4xl">

            <a href="{{ route('admin.products') }}" class="bg-white/80 text-gray-900 p-6 rounded-lg shadow hover:bg-blue-100 transition text-center">
                <i class="fa-solid fa-box text-2xl mb-2"></i>
                <h2 class="font-semibold text-lg">Manage Products</h2>
            </a>

            <a href="{{ route('admin.orders') }}" class="bg-white/80 text-gray-900 p-6 rounded-lg shadow hover:bg-green-100 transition text-center">
                <i class="fa-solid fa-truck text-2xl mb-2"></i>
                <h2 class="font-semibold text-lg">Manage Orders</h2>
            </a>

            <a href="{{ route('admin.users') }}" class="bg-white/80 text-gray-900 p-6 rounded-lg shadow hover:bg-purple-100 transition text-center">
                <i class="fa-solid fa-users text-2xl mb-2"></i>
                <h2 class="font-semibold text-lg">Manage Users</h2>
            </a>

            <a href="{{ route('admin.appointments.index') }}" class="bg-white/80 text-gray-900 p-6 rounded-lg shadow hover:bg-yellow-100 transition text-center">
                <i class="fa-solid fa-calendar-check text-2xl mb-2"></i>
                <h2 class="font-semibold text-lg">View Appointments</h2>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="bg-white/80 text-center text-red-600 p-6 rounded-lg shadow hover:bg-red-100 transition">
                @csrf
                <button type="submit" class="w-full">
                    <i class="fa-solid fa-arrow-right-from-bracket text-2xl mb-2"></i>
                    <h2 class="font-semibold text-lg">Logout</h2>
                </button>
            </form>

        </div>
    </main>

</body>
</html>
