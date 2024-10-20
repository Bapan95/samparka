<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public string $type;
    public $user;

    /**
     * Create a new component instance.
     *
     * @param string $type
     * @param mixed $user
     */
    public function __construct(string $type, $user)
    {
        $this->type = $type;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}
