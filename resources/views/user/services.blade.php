<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - Services</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Background Image and Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
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

<!-- NAVBAR -->
<nav class="bg-white bg-opacity-90 border-b border-gray-200 shadow-md text-black">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <a href="{{ route('user.home') }}" class="text-2xl font-bold text-blue-600">WoofWag</a>
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route('user.home') }}" class="hover:text-blue-600">Home</a>
                <a href="{{ route('user.shopnow') }}" class="hover:text-blue-600">Shop</a>
                <a href="{{ route('user.services') }}" class="hover:text-blue-600">Services</a>
                <a href="#" class="text-lg hover:text-blue-600"><i class="fas fa-shopping-cart"></i></a>
                <a href="{{ route('dashboard') }}" class="text-lg hover:text-blue-600"><i class="fas fa-user-circle"></i></a>
            </div>
            <div class="md:hidden">
                <button onclick="toggleMenu()" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <div id="mobileMenu" class="hidden md:hidden flex-col space-y-2 py-2 text-black">
            <a href="{{ route('user.home') }}" class="block px-2 hover:text-blue-600">Home</a>
            <a href="{{ route('user.shopnow') }}" class="block px-2 hover:text-blue-600">Shop</a>
            <a href="{{ route('user.services') }}" class="block px-2 hover:text-blue-600">Services</a>
            <a href="#" class="block px-2 hover:text-blue-600">My Orders</a>
            <a href="#" class="block px-2 hover:text-blue-600">Cart</a>
            <a href="#" class="block px-2 hover:text-blue-600">Profile</a>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<header class="text-center py-12">
    <h1 class="text-4xl font-bold text-white">🐾 Our Services</h1>
    <p class="mt-2 text-lg text-white">Providing the best care and support for your pets</p>
</header>

<!-- SERVICE CARDS -->
<div class="max-w-6xl mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 gap-6 mb-10">
    <!-- Vet Card -->
    <div class="bg-white bg-opacity-90 rounded-lg shadow text-black hover:shadow-lg transition">
        <img src="/images/vet.jpg" alt="Vet Booking" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4">
            <h3 class="text-xl font-bold mb-2">Vet Checkup</h3>
            <p class="text-sm text-gray-700">Professional vet care for your pet’s health and wellness.</p>
            <button onclick="showForm('vet')" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Vet</button>
        </div>
    </div>

    <!-- Grooming Card -->
    <div class="bg-white bg-opacity-90 rounded-lg shadow text-black hover:shadow-lg transition">
        <img src="/images/grooming.jpg" alt="Grooming" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4">
            <h3 class="text-xl font-bold mb-2">Pet Grooming</h3>
            <p class="text-sm text-gray-700">Full grooming with bath, styling, nail trimming and more.</p>
            <button onclick="showForm('grooming')" class="mt-4 bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Book Grooming</button>
        </div>
    </div>
</div>

<!-- BOOKING FORM -->
<div class="max-w-3xl mx-auto p-6 bg-white bg-opacity-90 rounded shadow text-black hidden" id="serviceFormWrapper">
    <h2 class="text-2xl font-bold mb-4">Book a Service</h2>

    @if(session('success'))
        <div class="bg-green-100 p-3 rounded mb-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @php
    $today = now()->toDateString();
    $maxDate = now()->addDays(7)->toDateString(); // Only next 7 days
@endphp

<form method="POST" action="{{ route('services.store') }}" id="serviceForm" class="space-y-4">
    @csrf
    <input type="hidden" name="type" id="type"> {{-- JavaScript will set this --}}

    <div>
        <label class="block font-medium mb-1">Pet Name:</label>
        <input type="text" name="pet_name" class="border rounded w-full p-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Preferred Date:</label>
        <input
    type="date"
    name="preferred_date"
    id="preferred_date"
    class="border rounded w-full p-2"
    min="{{ $today }}"
    max="{{ $maxDate }}"
    required
>
    </div>

    <div>
        <label class="block font-medium mb-1">Preferred Time:</label>
        <input type="time" name="preferred_time" class="border rounded w-full p-2" required>
    </div>

    <div>
        <label class="block font-medium mb-1">Notes (optional):</label>
        <textarea name="notes" class="border rounded w-full p-2"></textarea>
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
        Book Service
    </button>
</form>

</div>

<!-- FOOTER -->
<footer class="bg-black bg-opacity-60 py-6 mt-10 text-white">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
        <!-- Newsletter -->
        <div>
            <h4 class="text-white font-semibold mb-2">Newsletter</h4>
            <p>Stay updated with our latest updates and offers</p>
            <input type="email" placeholder="Enter your email" class="mt-2 p-2 rounded-lg w-full text-black">
            <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">SUBSCRIBE</button>
        </div>
        <!-- Quick Links -->
        <div>
            <h4 class="text-white font-semibold mb-2">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('user.home') }}" class="hover:text-blue-400">Home</a></li>
                <li><a href="{{ route('user.shopnow') }}" class="hover:text-blue-400">Shop</a></li>
                <li><a href="{{ route('user.services') }}" class="hover:text-blue-400">Our Services</a></li>

            </ul>
        </div>
        <!-- Contact Info -->
        <div>
            <h4 class="text-white font-semibold mb-2">Contact Us</h4>
            <ul class="space-y-2">
                <li>Email: woofwag@gmail.com</li>
                <li>Phone: +94 77 123 4567</li>
                <li>Address: 123, Pet Street, Colombo, Sri Lanka</li>
            </ul>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }

    function showForm(type) {
        document.getElementById('serviceFormWrapper').classList.remove('hidden');
        document.getElementById('type').value = type;
        document.getElementById('serviceForm').scrollIntoView({ behavior: 'smooth' });
    }
</script>

</body>
</html>
