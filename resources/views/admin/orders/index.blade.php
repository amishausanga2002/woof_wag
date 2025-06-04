<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('/images/hero.jpg'); /* Adjust path if needed */
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

    <div class="max-w-6xl mx-auto p-6 bg-white/90 text-gray-900 rounded-lg shadow-lg mt-10">
        <h1 class="text-3xl font-bold mb-6">📦 All Orders</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-sm border border-gray-300 bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">Order ID</th>
                        <th class="border px-4 py-2">Customer</th>
                        <th class="border px-4 py-2">Items</th>
                        <th class="border px-4 py-2">Total</th>
                        <th class="border px-4 py-2">Status</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-100">
                            <td class="border px-4 py-2">#{{ $order->id }}</td>
                            <td class="border px-4 py-2">
                                {{ $order->name }}<br>
                                <small>{{ $order->email }}</small>
                            </td>
                            <td class="border px-4 py-2">
                                <ul class="list-disc pl-4">
                                    @php
                                        $items = is_array($order->items) ? $order->items : json_decode($order->items, true);
                                    @endphp

                                    @if(is_array($items))
                                        @foreach($items as $item)
                                            <li>{{ $item['name'] }} — Rs.{{ $item['price'] }}</li>
                                        @endforeach
                                    @else
                                        <li>No items found</li>
                                    @endif
                                </ul>
                            </td>
                            <td class="border px-4 py-2">Rs.{{ $order->total }}</td>
                            <td class="border px-4 py-2">{{ $order->status }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                                    @csrf
                                    <select name="status" class="border border-gray-300 p-1 text-sm w-full mb-2">
                                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="Out for Delivery" {{ $order->status == 'Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
                                        <option value="Delivered" {{ $order->status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                        <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                    <button class="w-full bg-blue-600 text-white px-2 py-1 text-sm rounded hover:bg-blue-700">
                                        Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('admin.dashboard') }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white px-6 py-2 rounded font-semibold">
            ← Back to Admin Dashboard
        </a>
    </div>
</body>
</html>
