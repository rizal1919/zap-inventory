<?php

namespace App\View\Components\main\dashboard;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class dashboard-component extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main.dashboard.dashboard-component');
    }
}
