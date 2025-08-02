<label class="{{ $labelClass }} flex flex-col gap-1">
    @if (isset($labelTxt))
        {{ $labelTxt }}
    @endif
    <input type="{{ $inputType }}" name="{{ $inputName }}" id="{{ $inputId }}"
        class="block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none  sm:text-sm {{ $inputClass }}"
        placeholder="{{ $inputPlaceholder }}"/>
</label>
