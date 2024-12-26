<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <img src="{{ asset('storage/food/'.$food->path)  }}" alt="" class="size-16 flex-none rounded-full">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $food->name_pt }} / {{ $food->name_en }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <header class="p-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        {{ __('Editar comida') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __("Aqui podes editar teus pratos") }}
                    </p>
                </header>

                <div class="p-6 pt-0">

                    <x-forms.form method="POST" action="/food/{{ $food->id }}" enctype="multipart/form-data">

                        <div class="columns-3 flex space-x-4 items-center">

                            <div class="w-5/6">
                                <div class="flex items-center space-x-6 py-4">
                                    <div class="shrink-0">
                                        <img class="h-16 w-16 object-cover rounded-full" id="file-ip-1-preview" src="{{ asset('storage/food/'.$food->path)  }}" alt="Current profile photo" />
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
                                <x-text-input id="name_pt" name="name_pt" type="text" class="mt-1 block w-full" :value="old('name_pt', $food->name_pt)"  required autofocus autocomplete="name_pt" />
                                <x-input-error class="mt-2" :messages="$errors->get('name_pt')" />
                            </div>

                            <div class="w-full">
                                <x-input-label for="name_en" :value="__('Nome em EN')" />
                                <x-text-input id="name_en" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en', $food->name_en)" required autofocus autocomplete="name_en" />
                                <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                            </div>
                        </div>

                        <div class="columns-2 flex space-x-4">

                            <div class="w-full">
                                <x-input-label for="ingredients_pt" :value="__('Ingredientes em PT')" />
                                <x-text-input id="ingredients_pt" name="ingredients_pt" type="text" class="mt-1 block w-full" :value="old('ingredients_pt', $food->ingredients_pt)" required autofocus autocomplete="ingredients_pt" />
                                <x-input-error class="mt-2" :messages="$errors->get('ingredients_pt')" />
                            </div>

                            <div class="w-full">
                                <x-input-label for="ingredients_en" :value="__('Ingredientes em EN')" />
                                <x-text-input id="ingredients_en" name="ingredients_en" type="text" class="mt-1 block w-full" :value="old('ingredients_en', $food->ingredients_en)" required autofocus autocomplete="ingredients_en" />
                                <x-input-error class="mt-2" :messages="$errors->get('ingredients_en')" />
                            </div>

                        </div>

                        <div class="columns-4 flex space-x-4">

                            <div class="w-full">
                                <x-input-label for="half_price" :value="__('Preço meia dose')" />
                                <x-text-input id="half_price" name="half_price" type="text" class="mt-1 block w-full" :value="old('half_price', $food->half_price)" autofocus autocomplete="half_price" />
                                <x-input-error class="mt-2" :messages="$errors->get('half_price')" />

                            </div>

                            <div class="w-full">
                                <x-input-label for="price" :value="__('Preço dose')" />
                                <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" :value="old('price', $food->price)" required autofocus autocomplete="price" />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>
                            <div class="w-full">

                                <x-input-label for="type" :value="__('Tipo')" />
                                <x-forms.select label="" name="type" :value="old('type', $food->type)">
                                    <option value="1" @if(old('type', $food->type) == 1) selected @endif>Entrada</option>
                                    <option value="2" @if(old('type', $food->type) == 2) selected @endif>Carne</option>
                                    <option value="3" @if(old('type', $food->type) == 3) selected @endif>Peixe</option>
                                    <option value="4" @if(old('type', $food->type) == 4) selected @endif>Hambúrguer</option>
                                    <option value="5" @if(old('type', $food->type) == 5) selected @endif>Salada</option>
                                    <option value="6" @if(old('type', $food->type) == 6) selected @endif>Sobremesa</option>
                                </x-forms.select>


                            </div>

                            <div class="w-full flex items-center justify-center">
                                <input id="default-checkbox" @if($food->is_menu) checked @endif name="is_menu" type="checkbox" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="default-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Pertence à carta</label>
                            </div>


                        </div>


                        <br>
                        <x-primary-button class="mt-6 py-4">{{ __('atualizar') }}</x-primary-button>

                    </x-forms.form>

                </div>

            </div>
        </div>
    </div>

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
