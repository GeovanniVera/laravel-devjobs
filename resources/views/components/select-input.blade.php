@if($label)
    <label for="{{ $id ?? $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
    </label>
@endif

<select 
    @if($wireModel) wire:model="{{ $wireModel }}" @endif 
    name="{{ $name }}" 
    id="{{ $id ?? $name }}" 
    class="block mt-1 w-full rounded-lg border-gray-300 @error($name) border-red-500 @enderror"
>
    <option value="" {{ $selected === null || $selected === '' ? 'selected' : '' }}>
        Seleccione una opción
    </option>
    
    @foreach($options as $key => $labelItem)
        <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
            {{ $labelItem }}
        </option>
    @endforeach
</select>

@error($name)
    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
@enderror
