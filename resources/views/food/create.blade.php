<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Novo prato') }}
        </h2>
    </x-slot>

    <div class="p-8 max-w-7xl mx-auto  overflow-hidden shadow-sm sm:rounded-lg mt-6 space-y-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white dark:bg-gray-800 pb-10">

            <header class="py-6">

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Adicionar comida') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __("Aqui podes criar teus pratos") }}
                </p>

            </header>

            <div class="w-full text-center text-red-500">
                @if ($errors->any())
                    <div class="">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <x-forms.form method="POST" action="/food" enctype="multipart/form-data">

                <div class="columns-3 flex space-x-4 items-center">

                    <div class="w-5/6">
                        <div class="flex items-center space-x-6 py-4">
                            <div class="shrink-0">
                                <img class="h-16 w-16 object-cover rounded-full" id="file-ip-1-preview" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />
                            </div>
                            <label class="block">
                                <span class="sr-only">Seleciona a imagem</span>
                                <input type="file" name="image" class="block w-full text-sm text-slate-500
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-violet-50 file:text-violet-700
                                          hover:file:bg-violet-100
                                        " onchange="showPreview(event);"/>
                            </label>
                        </div>
                    </div>

                    <div class="w-full">
                        <x-input-label for="name_pt" :value="__('Nome em PT')" />
                        <x-text-input id="name_pt" name="name_pt" type="text" class="mt-1 block w-full" :value="old('name_pt')" required autofocus autocomplete="name_pt" />
                        <x-input-error class="mt-2" :messages="$errors->get('name_pt')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="name_en" :value="__('Nome em EN')" />
                        <x-text-input id="name_en" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en')" required autofocus autocomplete="name_en" />
                        <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                    </div>
                </div>

                <div class="columns-2 flex space-x-4">

                    <div class="w-full">
                        <x-input-label for="ingredients_pt" :value="__('Ingredientes em PT')" />
                        <x-text-input id="ingredients_pt" name="ingredients_pt" type="text" class="mt-1 block w-full" :value="old('ingredients_pt')"  autofocus autocomplete="ingredients_pt" />
                        <x-input-error class="mt-2" :messages="$errors->get('ingredients_pt')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="ingredients_en" :value="__('Ingredientes em EN')" />
                        <x-text-input id="ingredients_en" name="ingredients_en" type="text" class="mt-1 block w-full" :value="old('ingredients_en')"  autofocus autocomplete="ingredients_en" />
                        <x-input-error class="mt-2" :messages="$errors->get('ingredients_en')" />
                    </div>

                </div>

                <div class="columns-4 flex space-x-4">

                    <div class="w-full">
                        <x-input-label for="half_price" :value="__('Preço meia dose')" />
                        <x-text-input id="half_price" name="half_price" type="text" class="mt-1 block w-full" :value="old('half_price')" autofocus autocomplete="half_price" />
                        <x-input-error class="mt-2" :messages="$errors->get('half_price')" />

                    </div>

                    <div class="w-full">
                        <x-input-label for="price" :value="__('Preço dose')" />
                        <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price')"  autofocus autocomplete="price" />
                        <x-input-error class="mt-2" :messages="$errors->get('price')" />
                    </div>

                    <div class="w-full">
                        <x-input-label for="type" :value="__('Tipo')"  />
                        <x-forms.select label="" name="type" :value="old('type')">
                            <option value="1">Entrada</option>
                            <option value="2">Carne</option>
                            <option value="3">Peixe</option>
                            <option value="4">Hambúrguer</option>
                            <option value="5">Salada</option>
                            <option value="6">Sobremesa</option>
                        </x-forms.select>

                    </div>

                    <div class="w-full items-center text-center">
                        <input id="default-checkbox" @if(old('price') != null) checked @endif name="is_menu" type="checkbox" name="is_menu" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pertence à carta</label>
                    </div>

                </div>


                <br>
                <x-primary-button class="mt-6 py-4">{{ __('Guardar') }}</x-primary-button>

            </x-forms.form>

        </div>

    </div>

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}

{{--                <header class="p-6">--}}
{{--                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">--}}
{{--                        {{ __('Adicionar comida') }}--}}
{{--                    </h2>--}}

{{--                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">--}}
{{--                        {{ __("Aqui podes criar teus pratos") }}--}}
{{--                    </p>--}}
{{--                </header>--}}

{{--                <div class="p-6 pt-0">--}}

{{--                    <x-forms.form method="POST" action="/food" enctype="multipart/form-data">--}}

{{--                        <div class="pt-4 ">--}}
{{--                            <x-input-label for="name_pt" :value="__('Nome em PT')" />--}}
{{--                            <x-text-input id="name_pt" name="name_pt" type="text" class="mt-1 block w-full"  required autofocus autocomplete="name_pt" />--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('name_pt')" />--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <x-input-label for="name_en" :value="__('Nome em EN')" />--}}
{{--                            <x-text-input id="name_en" name="name_en" type="text" class="mt-1 block w-full" required autofocus autocomplete="name_en" />--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('name_en')" />--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <x-input-label for="ingredients_pt" :value="__('Ingredientes em PT')" />--}}
{{--                            <x-text-input id="ingredients_pt" name="ingredients_pt" type="text" class="mt-1 block w-full"  required autofocus autocomplete="ingredients_pt" />--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('ingredients_pt')" />--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <x-input-label for="ingredients_en" :value="__('Ingredientes em EN')" />--}}
{{--                            <x-text-input id="ingredients_en" name="ingredients_en" type="text" class="mt-1 block w-full"  required autofocus autocomplete="ingredients_en" />--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('ingredients_en')" />--}}
{{--                        </div>--}}
{{--                        <div class="">--}}
{{--                            <x-input-label for="price" :value="__('Preço')" />--}}
{{--                            <x-text-input id="price" name="price" type="text" class="mt-1 block w-full"  required autofocus autocomplete="price" />--}}
{{--                            <x-input-error class="mt-2" :messages="$errors->get('price')" />--}}
{{--                        </div>--}}

{{--                        <div class="flex items-center space-x-6 py-4">--}}
{{--                            <div class="shrink-0">--}}
{{--                                <img class="h-16 w-16 object-cover rounded-full" id="file-ip-1-preview" src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1361&q=80" alt="Current profile photo" />--}}
{{--                            </div>--}}
{{--                            <label class="block">--}}
{{--                                <span class="sr-only">Seleciona a imagem</span>--}}
{{--                                <input type="file" name="image" class="block w-full text-sm text-slate-500--}}
{{--                                  file:mr-4 file:py-2 file:px-4--}}
{{--                                  file:rounded-full file:border-0--}}
{{--                                  file:text-sm file:font-semibold--}}
{{--                                  file:bg-violet-50 file:text-violet-700--}}
{{--                                  hover:file:bg-violet-100--}}
{{--                                " onchange="showPreview(event);"/>--}}
{{--                            </label>--}}

{{--                        </div>--}}

{{--                        <x-primary-button class="my-2">{{ __('Guardar') }}</x-primary-button>--}}

{{--                    </x-forms.form>--}}



{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <script>
        function showPreview(event){
            if(event.target.files.length > 0){
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

</x-app-layout>
