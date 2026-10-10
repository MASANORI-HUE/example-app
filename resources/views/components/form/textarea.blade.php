@props([
    'name',
    'label' => '',
    'value' => '',
    'rows' => 3,
    'required' => false,
    'autofocus' => false,
    'placeholder' => '',
    'helpText' => ''
])

<div class="mt-4">
    @if($label)
        <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
        </label>
    @endif
    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $autofocus ? 'autofocus' : '' }}
        {{ $attributes->merge(['class' => 'focus:ring-blue-400 focus:border-blue-400 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2']) }}
    >{{ old($name, $value) }}</textarea>
    @if($helpText)
        <p class="mt-2 text-sm text-gray-500">{{ $helpText }}</p>
    @endif
    @error($name)
        <x-form.error>{{ $message }}</x-form.error>
    @enderror
</div>