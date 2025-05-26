<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Appointments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
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
<br><br><br><br>
<body class="text-white">

    <div class="max-w-7xl mx-auto px-6 py-10 bg-white/90 rounded-lg shadow-lg text-gray-900">
        <h1 class="text-3xl font-bold mb-6">📅 All Appointments</h1>

        <div class="overflow-x-auto">
            <table class="w-full text-sm border border-gray-300 bg-white rounded shadow">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border px-4 py-2">User</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Type</th>
                        <th class="border px-4 py-2">Pet</th>
                        <th class="border px-4 py-2">Date</th>
                        <th class="border px-4 py-2">Time</th>
                        <th class="border px-4 py-2">Notes</th>
                        <th class="border px-4 py-2">Booked At</th>
                        <th class="border px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($appointments as $a)
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2">{{ $a->user?->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ $a->user?->email ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">{{ ucfirst($a->type) }}</td>
                            <td class="border px-4 py-2">{{ $a->pet_name }}</td>
                            <td class="border px-4 py-2">{{ $a->preferred_date }}</td>
                            <td class="border px-4 py-2">{{ $a->preferred_time }}</td>
                            <td class="border px-4 py-2">{{ $a->notes ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $a->created_at->format('Y-m-d H:i') }}</td>
                            <td class="border px-4 py-2">
                                <form action="{{ route('admin.appointments.destroy', $a->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline text-sm font-medium">
                                        Delete
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
