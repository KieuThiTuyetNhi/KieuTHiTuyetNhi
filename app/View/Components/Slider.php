<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;
class Slider extends Component
{
    
    public function __construct()
    {
        //
    }

    
    public function render()
    {
        $list_slider=Slider::all();
        return view('components.slider');
    }
}
