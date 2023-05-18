<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Brand;

class NavBrand extends Component
{
   
    public function __construct()
    {
        //
    }

    
    public function render()
    {
        // return view('components.nav-brand');
        $data1 =[
            ['status','=','1'],
            ['sort_order','=','0'],
        ];
        $list_brand=brand::where($data1)->orderBy('created_at','asc')->get();
        return view('components.nav-brand',compact('list_brand'));
    }
}
