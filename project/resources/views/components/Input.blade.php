<div>
    <label class="{{ $labelClass ?? '' }}">
        @if (isset($label))
            <span class="block mb-1 text-sm font-medium text-gray-700">{{ $label }}</span>
        @endif

        <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $id ?? $name }}"
            placeholder="{{ $placeholder ?? '' }}" class="{{ $inputClass ?? '' }}">
    </label>
</div>
