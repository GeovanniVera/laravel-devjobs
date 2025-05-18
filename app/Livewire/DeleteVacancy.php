<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DeleteVacancy extends Component
{

    public $vacancy;

     protected $listeners = [
        'confirmDeleteVacancy' => 'deleteVacancy',
    ];

    public function deleteVacancy(Vacancy $vacancy)
    {
        if ($vacancy->user_id !== Auth::user()->id) {
            $this->dispatch('vacancyDeleteFailed', ['message' => 'No autorizado']);
            return;
        }
        $vacancy->delete();
        $this->dispatch('vacancyDeleted');
    }
    public function render()
    {
        return view('livewire.delete-vacancy');
    }
}
