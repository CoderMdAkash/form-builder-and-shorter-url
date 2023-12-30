<x-app-layout>

    <div class="py-12">

        <h2 class="text-center text-[25px]" >{{$formTemplate->title}}</h2>
        <form class="max-w-md mx-auto" method="POST" action="{{ route('form.store', $formTemplate->id) }}" >
            @csrf

            @foreach($formTemplate->fields as $field)
                @if($field->type === 'checkbox')
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="checkbox" id="{{ $field->id }}" name="formData[{{ $field->id }}]" {{ old($field->id) ? 'checked' : '' }}class="mr-2 leading-tight">
                        <label for="{{ $field->id }}">{{ $field->label }}</label>
                    </div>

                @elseif($field->type === 'radio')
                    <div class="flex items-center mb-4">
                        <input id="{{ $field->id }}" type="radio"  name="formData[{{ $field->id }}]" value="{{ $field->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="{{ $field->id }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $field->label }}</label>
                    </div>

                @elseif($field->type === 'select')
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="{{ $field->id }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $field->label }}</label>
                        <select id="{{ $field->id }}" name="formData[{{ $field->id }}]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" >
                            @php
                                $options = $field->options ? json_decode($field->options) : [];
                            @endphp
                            @foreach($options as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    </div>

                @elseif($field->type === 'textarea')
                    <textarea id="{{ $field->id }}" name="formData[{{ $field->id }}]" class="form-textarea block w-full mt-1 rounded-md border-gray-300 focus:border-indigo-500 focus:outline-none focus:shadow-outline-blue">{{ old($field->id) }}</textarea>

                @else
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="{{ $field->id }}">{{ $field->label }}</label>
                        <input type="{{$field->type}}" id="{{ $field->id }}" name="formData[{{ $field->id }}]" class="border border-gray-300 rounded-md p-2 w-full focus:outline-none focus:border-blue-500"value="{{ old($field->id) }}">
                    </div>

                @endif
            @endforeach

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>

    </div>
</x-app-layout>
