<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectInput extends Component
{
    public $options;
    public $valueField;
    public $labelField;
    public $selected;
    public $name;
    public $id;
    public $wireModel;

    public $label;

    public function __construct(
        $options = [],
        $valueField = 'id',
        $labelField = 'name',
        $selected = null,
        $name = null,
        $id = null,
        $wireModel = null,
        $label = null 
    ) {
        $this->options = $options;
        $this->valueField = $valueField;
        $this->labelField = $labelField;
        $this->selected = $selected;
        $this->name = $name ?? $wireModel;
        $this->id = $id;
        $this->wireModel = $wireModel;
        $this->label = $label;
    }


    public function render()
    {
        return view('components.select-input');
    }
}
