<form novalidate class="md:w-1/2 space-y-8  md:p-6 md:bg-white rounded-lg" wire:submit.prevent="updateVacancy"
    enctype="multipart/form-data">

    <!-- Title Form -->
    <h1 class="text-2xl font-bold text-center mb-10 my-10">Editar Vacante:</h1>


    <!-- Title -->
    <div class="mt-4">
        <x-input-label for="title" :value="__('Titulo')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Dev Junior Laravel 12" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- Category -->

    <div class="mt-4">
        <x-select-input :options="$categories" wireModel="category" name="category" id="category" label="Categoria"
            selected="{{ old('category') }}" />
    </div>

    <!-- Salary -->
    <div class="mt-4">
        <x-select-input :options="$salaries" wireModel="salary" name="salary" id="salary" label="Rango Salarial"
            selected="{{ old('salary') }}" />
    </div>
    <!-- Company -->
    <div class="mt-4">
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Google" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Last Day -->
    <div class="mt-4">
        <x-input-label for="last_day" :value="__('Ultimo Dia')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Description -->
    <div class="mt-4">
        <x-input-label for="description" :value="__('Descripciòn de la vacante')" />
        <textarea id="description" wire:model="description"
            class="block mt-1 w-full h-48 resize-none rounded-md border-gray-300 shadow-sm
               focus:border-indigo-500 focus:ring-indigo-500 transition duration-150">{{ old('description') }}</textarea>
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>

    <!-- Image -->
    <div class="mt-4">
        <x-input-label for="image" :value="__('Imagen')" />
        <label for="image"
            class="flex items-center justify-center w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm cursor-pointer bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            <span>Seleccionar archivo</span>
            <input id="image" type="file" wire:model="newImage" class="sr-only">
        </label>

        <div class="my-5 w-96">
            <!-- Preview de la imagen -->
            @if ($image)
                <x-input-label :value="__('Vista previa de la imagen : ')" />
                <img src="{{ asset('storage/' . $image) }}" alt="Imagen de la vacante {{ $title }}"
                    >
            @endif
        </div>
        <div class="my-5 w-96">
            @if ($newImage)
                Imagen Nueva:
                <img src="{{ $newImage->temporaryUrl() }}" alt="">
            @endif
        </div>

        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <!--Submit Button-->
    <x-primary-button class="w-full mr-auto mt-5">
        {{ __('Crear Vacante') }}
    </x-primary-button>

</form>
