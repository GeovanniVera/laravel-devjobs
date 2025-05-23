<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowVacancies extends Component
{

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

        $data = Vacancy::where('user_id', Auth::user()->id)->paginate(10);


        return view('livewire.show-vacancies', [
            'vacancies' => $data
        ]);
    }
}
