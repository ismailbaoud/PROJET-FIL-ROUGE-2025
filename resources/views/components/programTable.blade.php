<div class="bg-white border border-gray-600 rounded-xl shadow-sm overflow-hidden">
    <table class="min-w-full divide-y divide-gray-600">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Program Name</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Reward Range</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Reports</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase">Last Updated</th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-600 uppercase">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-600">
            @foreach ($programs as $program)
                @php
                    $colors = [
                        'en_attente' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'label' => 'En attente'],
                        'accepte' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'label' => 'Actif'],
                        'rejete' => ['bg' => 'bg-red-100', 'text' => 'text-red-800', 'label' => 'Inactif'],
                    ];
                    $status = $colors[$program->status] ?? ['bg' => 'bg-gray-100', 'text' => 'text-gray-800', 'label' => $program->status];
                @endphp
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">{{ $program->title }}</div>
                        <div class="text-xs text-gray-500">{{ $program->description }}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-3 py-1 inline-flex text-xs font-medium rounded-full {{ $status['bg'] }} {{ $status['text'] }}">
                            {{ $status['label'] }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">${{ $program->min_reward }} - ${{ $program->max_reward }}</td>
                    <td class="px-6 py-4 text-sm text-gray-500">243</td>
                    <td class="px-6 py-4 text-sm text-gray-500">{{ $program->updated_at->format('M d, Y') }}</td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex justify-end space-x-2">
                            <button class="text-blue-600 hover:text-blue-900"
                                onclick="openUpdateForm(this)"
                                data-id="{{ $program->id }}"
                                data-title="{{ $program->title }}"
                                data-description="{{ $program->description }}"
                                data-min_reward="{{ $program->min_reward }}"
                                data-max_reward="{{ $program->max_reward }}">Edit</button>
                            <button class="text-red-600 hover:text-red-900" onclick="deleteProgram({{ $program->id }})">Delete</button>
                            <a href="{{ route('programDetails', $program->id) }}" class="text-blue-600 hover:text-blue-900">Show</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
