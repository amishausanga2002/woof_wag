<div class="p-4">

    @php
        $today = now()->toDateString();
        $maxDate = now()->addDays(7)->toDateString();
    @endphp

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-2">
            {{ session('success') }}
        </div>
    @endif

    @if ($appointments->count())
        <table class="w-full border text-sm mb-6">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-2 py-1">Type</th>
                    <th class="border px-2 py-1">Pet</th>
                    <th class="border px-2 py-1">Date</th>
                    <th class="border px-2 py-1">Time</th>
                    <th class="border px-2 py-1">Notes</th>
                    <th class="border px-2 py-1">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $a)
                    <tr>
                        <td class="border px-2 py-1 capitalize">{{ $a->type }}</td>
                        <td class="border px-2 py-1">{{ $a->pet_name }}</td>
                        <td class="border px-2 py-1">{{ $a->preferred_date }}</td>
                        <td class="border px-2 py-1">{{ $a->preferred_time }}</td>
                        <td class="border px-2 py-1">{{ $a->notes ?? '-' }}</td>
                        <td class="border px-2 py-1">
                            <button wire:click="edit({{ $a->id }})" class="text-blue-500 hover:underline">Edit</button>
                            <button wire:click="delete({{ $a->id }})" class="text-red-500 hover:underline ml-2">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">You have no appointments yet.</p>
    @endif


    @if ($editId)
        <div class="bg-white p-4 border border-gray-300 rounded shadow-md">
            <h3 class="text-lg font-semibold mb-3">Edit Appointment</h3>

            <div class="mb-2">
                <label class="block text-sm font-medium">Pet Name:</label>
                <input type="text" wire:model="editPetName" class="w-full border px-2 py-1 rounded" />
                @error('editPetName') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-2">
                <label class="block text-sm font-medium">Preferred Date:</label>
                <input type="date"
                       wire:model="editDate"
                       min="{{ $today }}"
                       max="{{ $maxDate }}"
                       class="w-full border px-2 py-1 rounded" />
                @error('editDate') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-2">
                <label class="block text-sm font-medium">Preferred Time:</label>
                <input type="time" wire:model="editTime" class="w-full border px-2 py-1 rounded" />
                @error('editTime') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-2">
                <label class="block text-sm font-medium">Notes:</label>
                <textarea wire:model="editNotes" class="w-full border px-2 py-1 rounded"></textarea>
            </div>

            <div class="flex gap-2 mt-3">
                <button wire:click="update" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">
                    Save Changes
                </button>
                <button wire:click="resetEditFields" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                    Cancel
                </button>
            </div>
        </div>
    @endif

</div>
