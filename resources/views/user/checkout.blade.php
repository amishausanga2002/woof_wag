<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - Checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Background and Custom Style -->
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
                <a href="{{ route('dashboard') }}" class="text-lg hover:text-blue-600">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
        </div>
    </div>
</nav>

<!-- ✅ CHECKOUT FORM -->
<div class="max-w-3xl mx-auto bg-white bg-opacity-90 rounded shadow p-6 mt-10 text-black">
    <h1 class="text-3xl font-bold mb-6 text-center">🧾 Checkout</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('cart.processCheckout') }}" method="POST" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block font-medium mb-1">Full Name</label>
            <input type="text" name="name" id="name" required
                   value="{{ old('name') }}"
                   class="w-full border border-gray-300 px-3 py-2 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div>
            <label for="email" class="block font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" required
                   value="{{ old('email') }}"
                   class="w-full border border-gray-300 px-3 py-2 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-500">
        </div>

        <div>
            <label for="address" class="block font-medium mb-1">Address</label>
            <textarea name="address" id="address" required rows="4"
                      class="w-full border border-gray-300 px-3 py-2 rounded shadow-sm focus:outline-none focus:ring focus:border-blue-500">{{ old('address') }}</textarea>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-green-600 text-white font-semibold px-6 py-2 rounded hover:bg-green-700">
                Place Order
            </button>
        </div>
    </form>
</div>

<!-- ✅ FOOTER -->
<footer class="bg-black bg-opacity-60 py-6 mt-10 text-white">
    <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
        <div>
            <h4 class="text-white font-semibold mb-2">Newsletter</h4>
            <p>Stay updated with our latest updates and offers</p>
            <input type="email" placeholder="Enter your email" class="mt-2 p-2 rounded-lg w-full text-black">
            <button class="mt-2 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">SUBSCRIBE</button>
        </div>
        <div>
            <h4 class="text-white font-semibold mb-2">Quick Links</h4>
            <ul class="space-y-2">
                <li><a href="{{ route('user.home') }}" class="hover:text-blue-400">Home</a></li>
                <li><a href="{{ route('user.shopnow') }}" class="hover:text-blue-400">Shop</a></li>
                <li><a href="{{ route('user.services') }}" class="hover:text-blue-400">Services</a></li>
            </ul>
        </div>
        <div>
            <h4 class="text-white font-semibold mb-2">Contact Us</h4>
            <ul class="space-y-2">
                <li>Email: woofwag@example.com</li>
                <li>Phone: +94 77 123 4567</li>
                <li>Address: 123, Pet Street, Colombo, Sri Lanka</li>
            </ul>
        </div>
    </div>
</footer>

</body>
</html>
