<x-app-layout>

    <div class="py-12">


        <form class="max-w-md mx-auto" action="{{route('fields.update', $field->id)}}" method="POST" >
            @csrf
            @method('PUT')

            <div class="relative z-0 w-full mb-5 group">
                <label for="form_template_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Form template</label>
                <select id="form_template_id" name="form_template_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected>Choose a Form template</option>
                  @foreach ($formTemplate as $item)
                    <option {{$field->form_template_id ==$item->id ? 'selected' : ''}} value="{{$item->id}}">{{$item->title}}</option>
                  @endforeach
                </select>
                @error('form_template_id')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                @enderror
            </div>



            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $field->name }}"  />
                <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                @error('name')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                @enderror
            </div>


            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="label" id="label" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $field->label }}"  />
                <label for="label" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">label</label>
                @error('label')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                @enderror
            </div>


            <div class="relative z-0 w-full mb-5 group">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                  <option selected value="" >Choose a type</option>
                  @foreach (SELECT_OPTION as $key=>$item)
                  <option {{$field->type ==$key ? 'selected' : ''}} value="{{$key}}">{{$item}}</option>
                  @endforeach
                </select>
                @error('type')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                @enderror
            </div>


            <div class="dropdown_field relative z-0 w-full mb-5 group">
                <label for="options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Options</label>
                <select id="options" name="options[]"  multiple="multiple" class="tags bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @php
                        $options = $field->options ? json_decode($field->options) : [];
                    @endphp
                    @foreach ($options as $key=>$option)
                   <option value=" {{ $option }}" selected> {{ $option }}</option>
                    @endforeach
                </select>
                @error('options')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="order" id="order" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="{{ $field->order }}"  />
                <label for="order" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Order Id</label>
                @error('order')
                    <p id="filled_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"> {{$message}}</p>
                @enderror
            </div>


            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </form>

    </div>
</x-app-layout>
<script>
    $(document).ready(function(){

        $(".tags").select2({tags: true});
        $('#type').on('change', function(e) {
            let val = $(this).val();
            if (val=='select') {
                $('.dropdown_field').removeClass('hidden');
            }else{
                $('.dropdown_field').addClass('hidden');
                $('#options').empty();
            }
        })


        function load(){
            let type = "{{$field->type}}"
            if (type != 'select') {
                $('.dropdown_field').addClass('hidden');
            }
        }
        load();

    })

</script>
