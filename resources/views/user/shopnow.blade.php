<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - Shop</title>
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

    <!-- Custom Styles -->
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
                <a href="{{ route('user.cart') }}" class="relative text-gray-700 hover:text-blue-600 text-lg">
                    <i class="fas fa-shopping-cart"></i>
                    @if(!empty($cartCount))
                        <span class="absolute -top-2 -right-2 bg-red-600 text-white text-xs font-bold rounded-full px-2 py-0.5">
                            {{ $cartCount }}
                        </span>
                    @endif
                </a>

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

<!-- PAGE HEADER -->
<header class="text-center py-12">
    <h1 class="text-5xl font-bold">🛍️ Shop Now</h1>
    <p class="mt-4 text-lg text-white">Explore our best-selling pet products</p>
</header>

<!-- PRODUCTS SECTION -->
<div class="max-w-7xl mx-auto p-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="bg-white bg-opacity-90 rounded shadow p-4 hover:shadow-lg transition text-black">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-3 rounded">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center mb-3">No Image</div>
                @endif

                <h2 class="text-lg font-bold mb-1">{{ $product->name }}</h2>
                <p class="text-sm text-gray-700 mb-2">{{ $product->description }}</p>
                <p class="text-green-700 font-bold mb-2">Rs.{{ $product->price }}</p>

                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">
                        Add to Cart
                    </button>
                </form>
            </div>
        @empty
            <p>No products available.</p>
        @endforelse
    </div>
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

<!-- Script -->
<script>
    function toggleMenu() {
        const menu = document.getElementById('mobileMenu');
        menu.classList.toggle('hidden');
    }
</script>

</body>
</html>
