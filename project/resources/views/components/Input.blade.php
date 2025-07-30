<label class="{{ $labelClass }} flex flex-col gap-1">
    @if (isset($labelTxt))
        {{ $labelTxt }}
    @endif
    <input type="{{ $inputType }}" name="{{ $inputName }}" id="{{ $inputId }}"
        class="{{ $inputClass }} block w-full px-3 py-2 border border-gray-500 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-lime-600 focus:border-lime-600 sm:text-sm"
        placeholder="{{ $inputPlaceholder }}"/>
</label>
