<div>
    @isset($label)
        <label for="{{ $name }}" class="block font-medium text-sm text-gray-700">{{ $label }}</label>
    @endisset

    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md']) }}
    >
        <option value="">-- Seleccione --</option>
        @foreach ($options as $key => $optionValue)
            <option value="{{ $key }}" @if (old($name, $value) == $key) selected @endif>{{ $optionValue }}</option>
        @endforeach
    </select>

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>