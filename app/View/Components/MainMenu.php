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
        $list_menu= Menu::all();
        return view('components.main-menu',compact('list_menu'));
    }
}
