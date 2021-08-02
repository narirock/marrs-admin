<?php

namespace Marrs\MarrsAdmin\Views\Components;

use Marrs\MarrsAdmin\Models\Menu as MenuModel;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        //dd(MenuModel::get());
        $items = array();
        foreach (MenuModel::whereNull('menu_id')->get() as $title) {
            $items[] = $title;
        }


        return view('marrs-admin::components.menu', ['items' => $items]);
    }


    public function loadChilds()
    {
    }
}
