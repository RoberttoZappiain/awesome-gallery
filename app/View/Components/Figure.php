<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Figure extends Component
{

    public $src;

    public $title;

    public $location;

    /**
     * Create a new component instance.
     */
    public function __construct(string $src, string $title, string $location)
    {
        $this->src = $src;
        $this->title = $title;
        $this->location = $location;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.figure');
    }
}
