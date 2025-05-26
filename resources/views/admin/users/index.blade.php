<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-image: url('/images/hero.jpg'); /* adjust path if needed */
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

    <div class="max-w-6xl mx-auto p-6 mt-10 bg-white/90 rounded-lg shadow text-gray-900">
        <h1 class="text-3xl font-bold mb-6">👥 Manage Users</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 font-semibold">
                {{ session('success') }}
            </div>
        @endif

        @if($users->isEmpty())
            <p class="text-gray-700">No users found.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm border border-gray-300 bg-white rounded">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Name</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Role</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr class="hover:bg-gray-100">
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">
                                    @if($user->role == 1)
                                        Supplier
                                    @else
                                        Customer
                                    @endif
                                </td>
                                <td class="border px-4 py-2">
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this user?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 text-xs">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <div class="mt-6 text-center">
        <a href="{{ route('admin.dashboard') }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white px-6 py-2 rounded font-semibold">
            ← Back to Admin Dashboard
        </a>
    </div>
</body>
</html>
