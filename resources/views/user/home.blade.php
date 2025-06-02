<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>WoofWag - Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Bootstrap 5 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

        <!-- Combined Style -->
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

            /* Dark overlay across the full screen */
            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.6); /* darker overlay */
                z-index: -1;
            }
        </style>

    </head>

<body class="bg-gray-50 text-gray-800">

<!-- NAVBAR -->
<nav class="bg-white border-b border-gray-200 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

            <!-- Logo -->
            <a href="{{ route('user.home') }}" class="text-2xl font-bold text-blue-600">WoofWag</a>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-6 text-sm font-medium">
                <a href="{{ route('user.home') }}" class="text-gray-700 hover:text-blue-600">Home</a>
                <a href="{{ route('user.shopnow') }}" class="text-gray-700 hover:text-blue-600">Shop</a>
                <a href="{{ route('user.services') }}" class="text-gray-700 hover:text-blue-600">Services</a>

                <a href="" class="text-gray-700 hover:text-blue-600 text-lg">
                    <i class="fas fa-shopping-cart"></i>
                </a>

                <!-- Profile -->
                <a href="{{ route('dashboard') }}"  class="text-gray-700 hover:text-blue-600 text-lg">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button onclick="toggleMenu()" class="text-gray-700 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="hidden md:hidden flex-col space-y-2 py-2">
            <a href="{{ route('user.home') }}" class="block px-2 text-gray-700 hover:text-blue-600">Home</a>
            <a href="{{ route('user.shopnow') }}" class="block px-2 text-gray-700 hover:text-blue-600">Shop</a>
            <a href="{{ route('user.services') }}" class="block px-2 text-gray-700 hover:text-blue-600">Services</a>

            <a href="#" class="block px-2 text-gray-700 hover:text-blue-600">Cart</a>
            <a href="#" class="block px-2 text-gray-700 hover:text-blue-600">Profile</a>
        </div>
    </div>
</nav>

<!-- HERO SECTION -->
<header>



    <!-- Content -->
    <div class="relative z-10 flex flex-col items-center justify-center text-center px-4 py-20 h-full">
        <h1 class="text-5xl font-bold text-white">Welcome to WoofWag</h1>
        <p class="mt-4 text-lg text-white">Your one-stop pet care and products solution</p>
        <a href="{{ route('user.shopnow') }}" class="mt-6 inline-block px-6 py-3 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Shop Now</a>
    </div>
</header>





<!-- PRODUCT SECTION -->
<section class="my-12 px-4">
    <div class="container">
        <h2 class="text-3xl font-bold mb-8 text-center text-white">Popular Products</h2>
        <div class="row g-4">
            <!-- Product 1 -->
            <div class="col-md-4">
                <div class="card shadow-md hover:shadow-lg transition duration-300 h-100">
                    <img src="/images/dogleash.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Dog Leash</h5>
                        <p class="card-text">Strong and stylish leash for everyday walks.</p>

                    </div>
                </div>
            </div>
            <!-- Product 2 -->
            <div class="col-md-4">
                <div class="card shadow-md hover:shadow-lg transition duration-300 h-100">
                    <img src="/images/cat_toy.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Cat Toy</h5>
                        <p class="card-text">Fun interactive toy for your feline friend.</p>

                    </div>
                </div>
            </div>
            <!-- Product 3 -->
            <div class="col-md-4">
                <div class="card shadow-md hover:shadow-lg transition duration-300 h-100">
                    <img src="/images/shampoo.jpg" class="card-img-top" alt="Product">
                    <div class="card-body">
                        <h5 class="card-title">Pet Shampoo</h5>
                        <p class="card-text">Keep your pets clean and fresh with natural ingredients.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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



<!-- Mobile Menu Toggle Script -->
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>

</body>
</html>
