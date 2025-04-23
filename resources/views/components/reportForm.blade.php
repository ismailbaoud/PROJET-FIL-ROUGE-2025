<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700">Title</label>
        <input type="text" name="title" required 
               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Description</label>
        <textarea name="description" rows="4" required
                 class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500"></textarea>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Type</label>
        <input type="text" name="type" required placeholder="e.g. SQL Injection, XSS..."
               class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Severity</label>
        <select name="severity" required 
                class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
            <option value="">Select severity</option>
            <option value="Low">Low</option>
            <option value="Medium">Medium</option>
            <option value="High">High</option>
            <option value="Critical">Critical</option>
        </select>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Program</label>
        <select name="program_id" id="" class="mt-1 block w-full border border-gray-300 rounded-lg shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
            <option value="#">select program</option>
            @foreach ($programs as $program)
            <option value="{{$program->id}}">{{$program->title}}</option>
            @endforeach
        </select>
    </div>
        

    <div class="flex justify-end pt-2">
        <button type="submit" 
                class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Submit Report
        </button>
    </div>
</div>