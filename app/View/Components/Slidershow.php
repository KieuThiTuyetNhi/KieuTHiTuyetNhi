<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Slider;

class Slidershow extends Component
{
   
    public function __construct()
    {
        //
    }

    
    public function render()
    {
        $list_slider=Slider::where([['status','=',1],['posistion','slideshow']])->get();
        // var_dump($list_slider);
       return view('components.slidershow',compact('list_slider'));
    }
}
