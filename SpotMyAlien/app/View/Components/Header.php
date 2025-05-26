<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $logoAlt = 'Kleine alien'
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.header');
    }
}
