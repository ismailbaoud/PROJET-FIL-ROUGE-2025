@csrf
<div class="space-y-4">
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700">Program Name</label>
        <input type="text" name="title" id="name"
            class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
        @error('title')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" id="description" rows="4"
            class="mt-1 block w-full border border-gray-600 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"></textarea>
        @error('description')
            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="min_reward" class="block text-sm font-medium text-gray-700">Min Reward</label>
            <div class="relative mt-1 rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500">$</span>
                </div>
                <input type="number" name="min_reward" id="min_reward"
                    class="block w-full pl-7 pr-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                @error('min_reward')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="max_reward" class="block text-sm font-medium text-gray-700">Max Reward</label>
            <div class="relative mt-1 rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500">$</span>
                </div>
                <input type="number" name="max_reward" id="max_reward"
                    class="block w-full pl-7 pr-3 py-2 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
                @error('max_reward')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <div class="pt-2">
        <button type="submit"
            class="w-full flex justify-center items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Create Program
        </button>
    </div>
</div>

@if ($errors->any())
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            toggleForm('createForm');
        });
    </script>
@endif
