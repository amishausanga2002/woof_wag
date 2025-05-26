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
<body class="text-white">

<div class="max-w-5xl mx-auto p-6 bg-white bg-opacity-90 mt-10 rounded shadow text-black">
    <h1 class="text-3xl font-bold mb-6 text-center">🧾 My Orders</h1>

    @if($orders->isEmpty())
        <p class="text-gray-700 text-center">You haven't placed any orders yet.</p>
    @else
        <table class="w-full border text-sm mb-8">
            <thead class="bg-gray-100 text-gray-800">
                <tr>
                    <th class="border px-2 py-2">Order ID</th>
                    <th class="border px-2 py-2">Status</th>
                    <th class="border px-2 py-2">Total</th>
                    <th class="border px-2 py-2">Date</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach($orders as $order)
                    {{-- Order Row --}}
                    <tr>
                        <td class="border px-2 py-2 font-semibold">#{{ $order->id }}</td>
                        <td class="border px-2 py-2">{{ $order->status }}</td>
                        <td class="border px-2 py-2">${{ number_format($order->total, 2) }}</td>
                        <td class="border px-2 py-2">{{ $order->created_at->format('Y-m-d') }}</td>
                    </tr>

                    {{-- Products Row --}}
                    @php
                        $items = is_array($order->items) ? $order->items : json_decode($order->items, true);
                    @endphp

                    @if(is_array($items) && count($items))
                        <tr>
                            <td colspan="4" class="border px-4 py-3 bg-gray-50">
                                <strong>Products in Order #{{ $order->id }}:</strong>
                                <ul class="list-disc list-inside text-sm text-gray-700 mt-1">
                                    @foreach($items as $item)
                                        @php
                                            $name = $item['name'] ?? 'N/A';
                                            $price = floatval($item['price'] ?? 0);
                                            $quantity = intval($item['quantity'] ?? 1);
                                            $subtotal = $price * $quantity;
                                        @endphp
                                        <li>
                                            {{ $name }} — ${{ number_format($price, 2) }} × {{ $quantity }} = ${{ number_format($subtotal, 2) }}
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="4" class="border px-4 py-3 italic text-gray-500 bg-gray-100">
                                No products found in this order.
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @endif

    <!-- ✅ Back to Dashboard Button -->
    <div class="text-center">
        <a href="{{ route('dashboard') }}">
            <button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded shadow">
                ← Back to Dashboard
            </button>
        </a>
    </div>
</div>

</body>
</html>
