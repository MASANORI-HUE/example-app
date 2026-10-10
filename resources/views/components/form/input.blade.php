@props([
    'type' => 'text',
    'name',
    'label',
    'value' => '',
    'required' => false,
    'autofocus' => false,
    'placeholder' => ''
])

<div class="mt-4">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
        {{ $label }}
    </label>
    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $autofocus ? 'autofocus' : '' }}
        {{ $attributes->merge(['class' => 'focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2']) }}
    >
    @error($name)
        <x-form.error>{{ $message }}</x-form.error>
    @enderror
</div>