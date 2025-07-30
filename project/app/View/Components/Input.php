<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $labelClass = 'text-sm font-semibold text-gray-300',
        public string $labelTxt,
        public ?string $inputType = 'text',
        public string $inputName = '',
        public ?string $inputId,
        public ?string $inputClass,
        public ?string $inputPlaceholder = '',
    ) {
        if (\is_null($this->inputId)) {
            $this->inputId = $this->inputName;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input');
    }
}
