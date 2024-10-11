<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{

    // Definindo as propriedades do Modal
    public $id;
    public $labelledby;
    public $title;
    public $modalclasswidth;
    public $modalclass;

    /**
     * Create a new component instance.
     */
    public function __construct($id, $labelledby, $title, $modalclasswidth, $modalclass)
    {
        $this->id = $id;
        $this->labelledby = $labelledby;
        $this->title = $title;
        $this->modalclasswidth = $modalclasswidth;
        $this->modalclass = $modalclass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.modal');
    }
}
