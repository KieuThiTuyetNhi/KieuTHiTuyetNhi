<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;
class MainMenu extends Component
{
   
    public function __construct()
    {
        //
    }

    
    public function render()
    {
        $list_menu= Menu::where([['position','=','mainmenu'],['status','=',1]])->get();
        return view('components.main-menu',compact('list_menu'));
    }
}
