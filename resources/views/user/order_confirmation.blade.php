<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmed - WoofWag</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])


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

<div class="max-w-3xl mx-auto p-6 mt-12 bg-white bg-opacity-90 rounded shadow text-black">
    <h1 class="text-3xl font-bold mb-4 text-green-700">✅ Order Confirmed!</h1>

    <p class="mb-2 text-lg">Order ID: <strong>#{{ $order->id }}</strong></p>
    <p class="mb-2 text-gray-800">Status: <span class="font-semibold">{{ $order->status }}</span></p>

    <h2 class="text-xl font-semibold mt-6 mb-2">🛍️ Items in Your Order:</h2>
    <ul class="space-y-1 list-disc list-inside text-gray-700">
        @foreach(json_decode($order->items, true) as $item)
            <li>
                {{ $item['name'] }} (x{{ $item['quantity'] }}) - Rs.{{ number_format($item['price'], 2) }}
            </li>
        @endforeach
    </ul>

    <div class="mt-6 text-xl font-bold text-right text-gray-900">
        Total Paid: Rs.{{ number_format($order->total, 2) }}
    </div>

    
    <div class="mt-8 text-center">
        <a href="{{ route('user.shopnow') }}">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow">
                🛒 Back to Shop
            </button>
        </a>
    </div>
</div>

</body>
</html>
