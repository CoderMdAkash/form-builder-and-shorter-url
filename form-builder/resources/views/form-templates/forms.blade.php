<x-app-layout>

    <div class="py-12">

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="mb-4">
                <form action="{{ route('forms.index') }}" method="GET">
                    @php
                        $category_id  = $_GET['category_id'] ?? '';
                        $form_template  = $_GET['form_template_id'] ?? '';
                    @endphp
                    <label for="category_id" class="mr-2">Select Category:</label>
                    <select name="category_id" id="category_id" class="px-2 py-1 border rounded-md">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option {{$category_id==$category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-3 py-1 bg-blue-500 text-white rounded-md">Filter</button>
                </form>
            </div>

            @if ($all_templates->count() <= 0)
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
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Submission
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_templates as $item)
                        <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->title}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$item->category->name ?? ''}}
                            </th>
                            <td class="px-6 py-4">
                                {{$item->description}}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center p-5">
                                    <a href="{{ route('form.create', $item->id) }}"  class="inline-flex w-8 h-8 mr-2 items-center justify-center  text-white ml-3 font-[24px]" >
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                            <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.98 2.98 0 0 0 .13 5H5Z"/>
                                            <path d="M14.066 0H7v5a2 2 0 0 1-2 2H0v11a1.97 1.97 0 0 0 1.934 2h12.132A1.97 1.97 0 0 0 16 18V2a1.97 1.97 0 0 0-1.934-2Z"/>
                                        </svg>
                                    </a>
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
