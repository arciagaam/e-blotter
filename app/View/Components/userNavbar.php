<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class userNavbar extends Component
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
        function getNameAndLogo($object)
        {
            return (object)[
                "name" => $object->name,
                "logo" => $object->logo,
            ];
        }

        $barangayInformation = getNameAndLogo(auth()->user()->barangays[0]);
        return view('components.user-navbar', ["barangayInformation" => $barangayInformation]);
    }
}
