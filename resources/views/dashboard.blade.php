<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestão da semana') }}
        </h2>
    </x-slot>

    <div class="py-12 ">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="/search" method="GET" class="">

                <div class="py-1 bg-white dark:bg-gray-800 text-center overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="flex gap-4">
                        <!-- First Column (Half Width) -->
                        <div class="basis-1/2 p-4">
                            <x-input-label for="q" :value="__('Nome do prato')" />
                            <!-- Text Input -->
                            <x-text-input
                                id="search"
                                name="q"
                                type="text"
                                class="w-full mt-4"
                                :value="old('q', $q)"
                            />
                            <x-input-error class="mt-2" :messages="$errors->get('q')" />
                        </div>

                        <!-- Remaining Columns (Each 1/6) -->
                        <div class="basis-1/6 p-4">
                            <div class="flex items-center mb-4 mt-7">
                                <input id="default-checkbox" @if($is_menu) checked @endif name="is_menu" type="checkbox" value="" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apenas menú</label>
                            </div>
                            <div class="flex items-center mb-4 mt-2">
                                <input id="default-checkbox" @if($dates) checked @endif name="dates" type="checkbox" value="" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Apenas com data</label>
                            </div>
{{--                            <div class="w-full items-center text-center">--}}
{{--                                <x-input-label for="is_menu" :value="__('Apenas Menu')" />--}}
{{--                                <x-text-input id="is_menu" name="is_menu" type="checkbox" class="items-center size-6 mt-4" :value="old('is_menu', $is_menu)" autofocus autocomplete="is_menu" />--}}
{{--                                <x-input-error class="mt-2" :messages="$errors->get('is_menu')" />--}}
{{--                            </div>--}}
                        </div>
                        <div class="basis-1/6 p-4 text-center">

                            <div class="flex items-center mb-4 mt-3">
                                <input id="default-checkbox"
                                       class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                       type="checkbox"
                                       value="1"
                                       name="type[]"
                                        {{ in_array(1, request('type', [])) ? 'checked' : '' }}
                                >
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Entrada</label>
                            </div>
                            <div class="flex items-center mb-4 mt-2">
                                <input id="default-checkbox"
                                       class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                       type="checkbox"
                                       value="2"
                                       name="type[]"
                                       {{ in_array(2, request('type', [])) ? 'checked' : '' }}
                                >
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Prato Principal</label>
                            </div>
                            <div class="flex items-center mb-4 mt-2">
                                <input id="default-checkbox"
                                       class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                       type="checkbox"
                                       value="3"
                                       name="type[]"
                                    {{ in_array(3, request('type', [])) ? 'checked' : '' }}
                                >
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Sobremesa</label>
                            </div>

{{--                            <div class="w-full items-center text-center">--}}
{{--                                <x-input-label for="dates" :value="__('Pratos da semana')" />--}}
{{--                                <x-text-input id="dates" name="dates" type="checkbox" class="items-center size-6 mt-4" :value="old('dates', $dates)" autofocus autocomplete="is_menu" />--}}
{{--                                <x-input-error class="mt-2" :messages="$errors->get('is_menu')" />--}}
{{--                            </div>--}}
                        </div>
                        <div class="basis-1/6 p-4">
                            <!-- Create Section (20%) -->
                            <div class="flex items-center justify-end h-full">
                                <a class="px-4 py-2 rounded-lg hover:text-blue-600 cursor-pointer text-white" href="/food/create">
                                    <i class="bi bi-plus"></i> {{ __("Novo Prato") }}
                                </a>
                            </div></div>
                    </div>

                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="w-full text-white">
                            <!-- Submit Button -->
                            <button
                                type="submit"
                                class="px-4 py-2 text-white rounded-lg hover:text-blue-600"
                            >
                                <i class="bi bi-search"></i> Pesquisar
                            </button>
                        </div>

                    </div>

                </div>

            </form>

            <div class="p-6 bg-white dark:bg-gray-800 mt-3 rounded-lg">

                <div>
                    @if(count($food) == 0)
                        <div class="text-white text-center p-5">
                            Sem resultados
                        </div>
                    @endif
                    @foreach($food as $f)
                        <div class="container w-full rounded-lg bg-white dark:bg-gray-800 text-slate-900 ring-1 shadow-xl shadow-black/5 ring-slate-700/10 mb-4">
                            <div class="flex items-center p-4 pb-0 w-full border-b border-slate-700/10">
                                <!-- Image Section -->
                                <img src="storage/food/{{ $f->path }}" alt="" class="size-16 flex-none rounded-full">

                                <!-- Content Section -->
                                <div class="ml-4 flex-auto">
                                    <div class="font-medium text-white">
                                        <a href="/food/{{ $f->id }}">{{ $f->name_pt }} / {{ $f->name_en }}</a>
                                        @if($f->is_menu == 1)
                                            <i class="bi bi-menu-up ml-2"></i>
                                        @endif
                                    </div>
                                    <div class="mt-1 text-slate-500">
                                        {{ $f->ingredients_pt }} / {{ $f->ingredients_en }}
                                    </div>
                                </div>

                                <!-- Date Selector Section -->
                                <div class="flex items-center px-4 flex-initial space-x-2">
                                    @if($f->date != null)
                                        <a onclick="clearDate({{ $f->id }})" class="text-white pr-2">
                                            <i class="bi bi-x-lg"></i>
                                        </a>
                                    @endif
                                    <input
                                        type="date"
                                        id="date-{{ $f->id }}"
                                        data-id="{{ $f->id }}"
                                        class="date-input p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 filter invert"
                                        value="{{ $f->date ? $f->date->format('Y-m-d') : '' }}"
                                    />
                                </div>



                                <!-- Price Section -->
                                <div class="font-light text-white flex-initial px-5 min-w-[150px]">
                                    @if($f->half_price != null) {{ $f->half_price }} / @endif {{ $f->price }}
                                </div>

                                <!-- Edit Icon Section -->
                                <div class="font-medium text-white flex-initial px-1">
                                    <a href="/food/{{ $f->id }}">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>

                                <!-- Delete Icon Section -->
                                <div class="font-medium text-red-500 flex-initial px-1">
                                    <x-forms.form method="POST" action="/food/{{ $f->id }}/destroy" id="deleteForm">
                                        <button class="pb-5" type="submit" onclick="return confirm('Esta ação é irreversível!')">
                                            <i class="bi bi-trash text-red-500 pb-2"></i>
                                        </button>
                                    </x-forms.form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <script>

        function ClearFilters(){
            document.getElementById("search").value = "";
            location.reload();
        }

        async function clearDate(param) {
            // alert('Attempting to clear the date...');
            try {
                const response = await fetch(`/clear-date/${param}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}', // Include CSRF token for security
                    },
                    body: JSON.stringify({ date: null })
                });

                if (response.ok) {
                    const inputElement = document.querySelector(`#date-${param}`);
                    if (inputElement) {
                        inputElement.value = ''; // Clear the date input
                    }
                    // alert('Date cleared successfully!');
                    // Swal.fire({
                    //     position: "top-center",
                    //     icon: "success",
                    //     title: "Data eliminada",
                    //     showConfirmButton: false,
                    //     timer: 1500
                    // });
                    location.reload();
                } else {
                    console.error('Error clearing date:', await response.text());
                    alert('Failed to clear the date. Please try again.');
                }
            } catch (error) {
                console.error('Request error:', error);
                alert('An error occurred. Please try again.');
            }
        }


        document.querySelectorAll('.date-input').forEach(input => {
            input.addEventListener('change', async function () {
                const recordId = this.dataset.id; // Get the record ID
                const newDate = this.value;       // Get the new date value
                // console.log("record:" + recordId,"date: "+ newDate);

                try {
                    const response = await fetch(`/update-date/${recordId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include CSRF token for security
                        },
                        body: JSON.stringify({ date: newDate })
                    });

                    if (response.ok) {
                        // Swal.fire({
                        //     position: "top-center",
                        //     icon: "success",
                        //     title: "Data atualizada",
                        //     showConfirmButton: false,
                        //     timer: 1500
                        // });
                        location.reload();
                    } else {
                        console.error('Error updating date:', await response.text());
                        alert('Algo falhou! Tenta novamente...');
                    }
                } catch (error) {
                    console.error('Error:', error);
                    alert('Algo falhou! Tenta novamente...');
                }
            });
        });
    </script>



</x-app-layout>
