<x-app-layout>
    <div class="py-12">
        

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Form Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted By</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submission Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($submissions as $submission)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $submission->formTemplate->title }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $submission->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $submission->created_at }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <ul>
                            @foreach(json_decode($submission->submitted_data, true) as $key => $value)
                                @php
                                    $field = App\Models\Field::find($key) ?? [];
                                @endphp
                                <li><b>{{ $field->name }}:</b> {{ $value }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$submissions->links()}}
    </div>
</x-app-layout>

