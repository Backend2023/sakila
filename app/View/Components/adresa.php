<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Address;

class adresa extends Component
{
    /**
     * Create a new component instance.
     */
    public $address;
    public function __construct(Address $address)
    {
        $this->address=$address;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.adresa');
    }
}
