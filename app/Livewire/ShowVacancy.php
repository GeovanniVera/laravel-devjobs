<?php

namespace App\Livewire;

use Livewire\Component;

class ShowVacancy extends Component
{

    public $vacancy;
    public function render()
    {
        return view('livewire.show-vacancy');
    }
}
