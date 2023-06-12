<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class FooterMenuItem extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $menu_row = null;
    public function __construct($menu)
    {
        $this->menu_row = $menu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $menu = $this->menu_row;
        $dk = [
            ['status', '=', '1'],
            ['parent_id', '=', $menu->id],
            ['position', '=', 'footermenu']
        ];
        $list_menu_sub = Menu::where($dk)->orderBy('sort_order', 'asc')->get();
        $sub = false;
        if (count($list_menu_sub) > 0) {
            $sub = true;
        }
        return view('components.footer-menu-item', compact('menu', 'list_menu_sub', 'sub'));
    }
}
