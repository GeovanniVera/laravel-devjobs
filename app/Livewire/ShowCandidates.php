<?php

namespace App\Livewire;

use Livewire\Component;

class ShowCandidates extends Component
{
    public $vacancy;

    public function render()
    {
        return view('livewire.show-candidates');
    }
}
