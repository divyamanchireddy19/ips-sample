<div class="mt-8">

    <form wire:submit.prevent="import" class="flex flex-col space-y-4 items-start">
        <div class="w-full">
            <label for="file" class="block text-sm font-medium text-gray-700">Upload File</label>
            <input type="file" id="file" wire:model="file" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('file')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-bold rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
            Import
        </button>
    </form>

</div>
