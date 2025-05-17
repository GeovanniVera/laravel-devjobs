<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowVacancies extends Component
{

    
    public function render()
    {

        $data = Vacancy::where('user_id', Auth::user()->id)->paginate(10);


        return view('livewire.show-vacancies',[
            'vacancies' => $data
        ]);
    }
}
