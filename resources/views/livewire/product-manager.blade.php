<div class="p-6 bg-white rounded shadow-md">
    <h2 class="text-xl font-bold mb-4">{{ $isEdit ? 'Edit Product' : 'Add Product' }}</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-600 font-semibold">
            {{ session('message') }}
        </div>
    @endif

    @if($isEdit)
        <div class="text-sm text-blue-500 mb-2">
            ✏️ Edit mode enabled for Product ID: {{ $product_id }}
        </div>
    @endif

    <div class="space-y-6">
        <form wire:submit.prevent="submitForm">
            
            <input type="text" wire:model.defer="name" placeholder="Product Name"
                class="border border-gray-300 px-4 py-2 rounded w-full mb-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror


            <textarea wire:model.defer="description" placeholder="Description"
                class="border border-gray-300 px-4 py-2 rounded w-full mb-3 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            @error('description') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror


            <input type="text" wire:model.defer="price" placeholder="Price"
                class="border border-gray-300 px-4 py-2 rounded w-full mb-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('price') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror


            <input type="file" wire:model="image" id="imageInput"
                class="border border-gray-300 px-4 py-2 rounded w-full mb-4 focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror


            <div class="flex items-center">
                @if($isEdit)
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-2 rounded font-semibold">
                        Update
                    </button>
                    <button type="button" wire:click="resetForm"
                        class="ml-2 px-6 py-2 bg-gray-300 hover:bg-gray-400 rounded font-semibold">
                        Cancel
                    </button>
                @else
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded font-semibold">
                        Save
                    </button>
                @endif
            </div>
        </form>
    </div>


    <div class="mt-8 overflow-x-auto bg-white border border-gray-300 rounded-lg shadow-md">
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
                    <tr class="hover:bg-gray-50" wire:key="product-{{ $product->id }}">
                        <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                        <td class="py-2 px-4 border-b">Rs.{{ number_format($product->price, 2) }}</td>
                        <td class="py-2 px-4 border-b">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="w-16 h-16 object-cover rounded">
                            @else
                                <span class="text-gray-400 italic">No Image</span>
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button type="button" wire:click="edit({{ $product->id }})"
                                class="text-blue-600 hover:underline mr-2">Edit</button>
                            <button type="button" wire:click="delete({{ $product->id }})"
                                class="text-red-600 hover:underline">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <br><br>
    <center>
        <a href="{{ route('admin.dashboard') }}"
            class="inline-block bg-gray-800 hover:bg-gray-700 text-white px-6 py-2 rounded font-semibold">
            ← Back to Admin Dashboard
        </a>
    </center>


    <script>
        Livewire.on('clearFileInput', () => {
            const input = document.getElementById('imageInput');
            if (input) input.value = '';
        });
    </script>
</div>
