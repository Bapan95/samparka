<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $headers;
    public $rows;
    public $actions;

    /**
     * Create a new component instance.
     *
     * @param array $headers
     * @param array $rows
     * @param callable $actions
     */
    public function __construct($headers, $rows, $actions = null)
    {
        $this->headers = $headers;
        $this->rows = $rows;
        $this->actions = $actions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.data-table');
    }
}
