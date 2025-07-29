<label class="{{ $labelClass }} flex flex-col gap-3">
    @if (isset($labelTxt))
        {{ $labelTxt }}
    @endif
    <input type="{{ $inpuType }}" name="{{ $inputName }}" id="{{ $inputId ?? $inputName }}"
        class="{{ $inputClass }} block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        placeholder="{{ $inputPlaceholder }}" />
</label>
