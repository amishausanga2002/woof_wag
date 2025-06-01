<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WoofWag - Cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Background Style -->
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

<!-- ✅ CART CONTENT -->
<div class="max-w-5xl mx-auto p-6 bg-white bg-opacity-90 rounded shadow mt-10 text-black">
    <h1 class="text-3xl font-bold mb-6 text-center text-black">🛒 Your Cart</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(count($cart) > 0)
        <div class="overflow-x-auto">
            <table class="w-full text-left border border-gray-200 rounded overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="p-3">Product</th>
                        <th class="p-3 text-center">Qty</th>
                        <th class="p-3 text-center">Price</th>
                        <th class="p-3 text-center">Subtotal</th>
                        <th class="p-3 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @php $total = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td class="p-3">
                                <div class="flex items-center gap-4">
                                    @if(isset($item['image']))
                                        <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded">
                                    @endif
                                    <span>{{ $item['name'] }}</span>
                                </div>
                            </td>
                            <td class="p-3 text-center">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center justify-center gap-2">
                                    @csrf
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-16 text-center border rounded px-2 py-1">
                                    <button type="submit" class="text-blue-600 hover:underline text-sm">Update</button>
                                </form>
                            </td>
                            <td class="p-3 text-center">Rs.{{ number_format($item['price'], 2) }}</td>
                            <td class="p-3 text-center">Rs.{{ number_format($subtotal, 2) }}</td>
                            <td class="p-3 text-center">
                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                    @csrf
                                    <button class="text-red-600 hover:underline text-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total -->
        <div class="text-right text-xl font-bold mt-6">
            Total: Rs.{{ number_format($total, 2) }}
        </div>

        <!-- Checkout Button -->
        <div class="text-right mt-4">
            <a href="{{ route('user.shopnow') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Shop more
            </a>
            <a href="{{ route('cart.checkout') }}" class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Proceed to Checkout
            </a>

        </div>
    @else
        <div class="text-center text-gray-600 text-lg">
            <p>Your cart is empty</p>
            <a href="{{ route('user.shopnow') }}" class="text-blue-600 hover:underline mt-2 inline-block">Continue Shopping</a>
        </div>
    @endif
</div>
<br><br><br><br><br><br><br>

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
