<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
{
    /**
     * Type alert message
     *
     * @var
     */
    public $type;

    /**
     * Text alert message
     *
     * @var
     */
    public $message;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->type = 'error';
        $this->message = 'test Alert';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.alert');
    }
}
