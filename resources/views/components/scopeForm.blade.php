<div class="space-y-6 text-whiyte">
    <div>
        <label for="target" class="block text-sm font-medium text-gray-700 mb-1">Target</label>
        <input type="text" name="target" id="target"
            class="block w-full border border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
            required>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
        <div>
            <label for="target_type" class="block text-sm font-medium text-gray-700 mb-1">Target Type</label>
            <select name="target_type" id="target_type"
                class="block w-full border bg-gray-600  border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                required>
                <option value="web">Web</option>
                <option value="mobile">Mobile</option>
                <option value="api">API</option>
                <option value="other">Other</option>
            </select>
        </div>

        <div>
            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Scope Type</label>
            <select name="type" id="type"
                class="block w-full border bg-gray-600 border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
                required>
                <option value="in">In Scope</option>
                <option value="out">Out of Scope</option>
            </select>
        </div>
    </div>

    <div>
        <label for="instructions" class="block text-sm font-medium text-gray-700 mb-1">Instructions</label>
        <textarea name="instructions" id="instructions" rows="4"
            class="block w-full border border-gray-600 rounded-lg shadow-sm px-4 py-3 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"
            required></textarea>
    </div>
</div>
