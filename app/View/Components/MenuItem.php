<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Menu;

class MenuItem extends Component
{
    public $rowmenu=null;
    public function __construct($menu)
    {
        $this->rowmenu=$menu;
    }

    
    public function render()
    {
        $menu=$this->rowmenu;
        $dk =[
            ['status','=','1'],
            ['parent_id','=',$menu->id],
            ['position','=','mainmenu']
        ];
        $list_menu_sub= Menu::where($dk)->orderBy('sort_order','asc')->get();
        $sub=false;
        if(count($list_menu_sub)>0){
            $sub=true;
        }

        return view('components.menu-item',compact('menu','list_menu_sub','sub'));
    }
}
