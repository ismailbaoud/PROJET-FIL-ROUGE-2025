<div class="space-y-4">
    <div>
        <label for="target" class="block text-sm font-medium text-gray-700">Target</label>
        <input type="text" name="target" id="target"
            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
            required>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="target_type" class="block text-sm font-medium text-gray-700">Target Type</label>
            <select name="target_type" id="target_type"
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                required>
                <option value="web">Web</option>
                <option value="mobile">Mobile</option>
                <option value="api">API</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700">Scope Type</label>
            <select name="type" id="type"
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                required>
                <option value="in">In Scope</option>
                <option value="out">Out of Scope</option>
            </select>
        </div>
    </div>

    <div>
        <label for="instructions" class="block text-sm font-medium text-gray-700">Instructions</label>
        <textarea name="instructions" id="instructions" rows="4"
            class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
            required></textarea>
    </div>

    <div class="pt-2">
        <button type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Save Scope
        </button>
    </div>
</div>