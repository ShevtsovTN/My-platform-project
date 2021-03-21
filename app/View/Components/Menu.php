<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Menu extends Component
{
    /**
     * The user's menu.
     *
     * @var string
     */
    public $menu;

    /**
     * The user's id.
     *
     * @var string
     */
    public $id;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $menu = include(config_path('menu.php'));
        $this->menu = $menu[Auth::user()->group];
        $this->id = Auth::id();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.menu');
    }
}
