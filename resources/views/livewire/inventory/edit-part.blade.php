<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">

<div class="mt-8 p-6">
    <div class="container mx-auto p-4 flex justify-between items-center">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900">Edit Part</h1>
        <div>
            <a href="{{ route('inventory.parts') }}" class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">View Parts</a>
        </div>
    </div>
</div>
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Part</h2>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('message') }}</strong>
        </div>
    @endif

    <form wire:submit.prevent="update" class="space-y-4">
        <!-- Part Number -->
        <div>
            <label for="part_number" class="block text-sm font-medium text-gray-700">Part Number</label>
            <input id="part_number" type="text" wire:model="part_number" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('part_number') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" wire:model="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3"></textarea>
            @error('description') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Quantity -->
        <div>
            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
            <input id="quantity" type="number" wire:model="quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('quantity') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Unit Price -->
        <div>
            <label for="unit_price" class="block text-sm font-medium text-gray-700">Unit Price</label>
            <input id="unit_price" type="text" wire:model="unit_price" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('unit_price') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Bin/Shelf Location -->
        <div>
            <label for="bin_shelf_location" class="block text-sm font-medium text-gray-700">Bin/Shelf Location</label>
            <input id="bin_shelf_location" type="text" wire:model="bin_shelf_location" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('bin_shelf_location') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Minimum Stock Level -->
        {{-- <div>
            <label for="minimum_stock_level" class="block text-sm font-medium text-gray-700">Minimum Stock Level</label>
            <input id="minimum_stock_level" type="number" wire:model="minimum_stock_level" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('minimum_stock_level') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
 --}}
        <!-- Reorder Quantity -->
        {{-- <div>
            <label for="reorder_quantity" class="block text-sm font-medium text-gray-700">Reorder Quantity</label>
            <input id="reorder_quantity" type="number" wire:model="reorder_quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('reorder_quantity') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>
 --}}
        <!-- Supplier ID -->
        {{-- <div>
            <label for="supplier_id" class="block text-sm font-medium text-gray-700">Supplier ID</label>
            <input id="supplier_id" type="text" wire:model="supplier_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('supplier_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div> --}}

        <!-- Status -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
            <select id="status" wire:model="status" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Select Status</option>
                <option value="0">Active</option>
                <option value="1">Archived</option>
                <!-- Add other status options as needed -->
            </select>
            @error('status') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Date of Last Order -->
        {{-- <div>
            <label for="date_of_last_order" class="block text-sm font-medium text-gray-700">Date of Last Order</label>
            <input id="date_of_last_order" type="date" wire:model="date_of_last_order" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('date_of_last_order') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div> --}}

        <!-- Date of Last Receipt -->
        {{-- <div>
            <label for="date_of_last_receipt" class="block text-sm font-medium text-gray-700">Date of Last Receipt</label>
            <input id="date_of_last_receipt" type="date" wire:model="date_of_last_receipt" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('date_of_last_receipt') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div> --}}

        <!-- Lead Time -->
        {{-- <div>
            <label for="lead_time" class="block text-sm font-medium text-gray-700">Lead Time (days)</label>
            <input id="lead_time" type="number" wire:model="lead_time" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('lead_time') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div> --}}

        <!-- Submit Button -->
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                Update Part
            </button>
        </div>
    </form>
</div>
</div>


