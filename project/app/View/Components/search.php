<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class search extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $searchClass = 'bg-[#363636] flex items-center justify-center p-2 pr-3 pl-3 rounded-lg w-auto h-10 hover:border-1 hover:border-[#E5E8EB]'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search');
    }
}
