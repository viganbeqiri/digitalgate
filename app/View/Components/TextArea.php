<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    public $label;
    public $id;
    public $type;
    public $name;
    public $value;
    public $isRequired;
    public $hintText;
    public $disabled;
    public $row;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        $label = "",
        $id = "",
        $type = "text",
        $name = "",
        $value = "",
        $isRequired = false,
        $hintText = null,
        $disabled = false,
        $row = 3

    ) {
        $this->label = $label;
        $this->id = $id;
        $this->type = $type;
        $this->name = $name;
        $this->value = $value;
        $this->isRequired = $isRequired;
        $this->hintText = $hintText;
        $this->disabled = $disabled;
        $this->row = $row;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-area');
    }
}
