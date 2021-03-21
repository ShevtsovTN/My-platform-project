<?php

namespace App\View\Components;

use App\Http\Controllers\MessagesController;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Messages extends Component
{
    /**
     * Count new messages
     *
     * @var
     */
    public $count;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->count = MessagesController::countNewMessages();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.messages');
    }
}
