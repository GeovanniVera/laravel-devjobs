<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectInput extends Component
{
    /**
     * El nombre del campo del select.
     *
     * @var string
     */
    public $name;

    /**
     * La etiqueta del select (opcional).
     *
     * @var string|null
     */
    public $label;

    /**
     * Las opciones del select (array asociativo o colección).
     *
     * @var array|\Illuminate\Support\Collection
     */
    public $options;

    /**
     * El valor seleccionado por defecto (opcional).
     *
     * @var mixed
     */
    public $value;

    /**
     * Atributos adicionales para el input select (opcional).
     *
     * @var string
     */
    public $attributes;

    /**
     * Create a new component instance.
     *
     * @param string $name
     * @param string|null $label
     * @param array|\Illuminate\Support\Collection $options
     * @param mixed $value
     * @param string $attributes
     * @return void
     */
    public function __construct(string $name, ?string $label = null, $options = [], $value = null, string $attributes = '')
    {
        $this->name = $name;
        $this->label = $label;
        $this->options = $options;
        $this->value = $value;
        $this->attributes = $attributes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select-input');
    }

}
