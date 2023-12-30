<x-app-layout>

    <div class="py-12">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            @if ($categories->count() <= 0)
                <div class="mb-16 bg-white border border-gray-100 rounded-xl">
                    <div class="flex flex-col justify-center items-center">
                        <h3 class="p-6 text-center text-xl">
                            No data found
                        </h3>
                    </div>
                </div>
            @else
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Category name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Organization name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{$item->name}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                   {{$item->organization->name}}
                                </th>
                                <td class="px-6 py-4">
                                    {{$item->description}}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-center p-5">
                                        <a class="btn btn-info"
                                            href="{{ route('categories.edit', $item->id) }}">
                                            Edit
                                        </a>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <button data-delete-route="{{ route('categories.destroy', $item->id) }}"class="delete-item-btn btn btn-danger">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif
        </div>

    </div>
</x-app-layout>
