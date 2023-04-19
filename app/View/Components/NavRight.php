<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;


class NavRight extends Component
{
   
    public function __construct()
    {
        //
    }

  
    public function render()
    {
        $data1 =[
            ['status','=','1'],
            ['parent_id','=','0'],
        ];
        $list_category=Category::where($data1)->orderBy('created_at','asc')->get();
        return view('components.nav-right',compact('list_category'));
    }
}
