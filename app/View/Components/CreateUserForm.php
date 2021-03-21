<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CreateUserForm extends Component
{
    /**
     * Type of users created
     *
     * @var
     */
    public $userTypes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $types = include(config_path('usertypes.php'));
        $this->userTypes = $types[Auth::user()->group];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.create-user-form');
    }
}
