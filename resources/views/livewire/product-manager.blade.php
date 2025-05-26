<div class="max-w-5xl mx-auto bg-white/95 p-6 rounded-lg shadow-lg text-gray-900">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 font-semibold">
            {{ session('success') }}
        </div>
    @endif



    <!-- Product Form -->
    <div class="mb-6">
        <input type="text" wire:model="name" placeholder="Product Name"
            class="border border-gray-300 px-4 py-2 rounded w-full mb-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <textarea wire:model="description" placeholder="Description"
            class="border border-gray-300 px-4 py-2 rounded w-full mb-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>

        <input type="text" wire:model="price" placeholder="Price"
            class="border border-gray-300 px-4 py-2 rounded w-full mb-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <input type="file" wire:model="image"
            class="border border-gray-300 px-4 py-2 rounded w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">

        @if($isEdit)
            <button wire:click="update" class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded font-semibold">Update</button>
            <button wire:click="resetForm" class="ml-2 px-6 py-2 bg-gray-300 hover:bg-gray-400 rounded font-semibold">Cancel</button>
        @else
            <button wire:click="save" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">Save</button>
        @endif
    </div>

    <!-- Product Table -->
    <div class="overflow-x-auto bg-white border border-gray-300 rounded-lg shadow-md">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 px-4 border-b">Name</th>
                    <th class="py-3 px-4 border-b">Description</th>
                    <th class="py-3 px-4 border-b">Price</th>
                    <th class="py-3 px-4 border-b">Image</th>
                    <th class="py-3 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                        <td class="py-2 px-4 border-b">${{ number_format($product->price, 2) }}</td>
                        <td class="py-2 px-4 border-b">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="#" wire:click="edit({{ $product->id }})" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <a href="#" wire:click="delete({{ $product->id }})" class="text-red-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Back Button -->
    <div class="mt-6 text-center">
        <a href="{{ route('admin.dashboard') }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white px-6 py-2 rounded font-semibold">
            ← Back to Admin Dashboard
        </a>
    </div>
</div>
