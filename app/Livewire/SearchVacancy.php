<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Livewire\Component;

class SearchVacancy extends Component
{
    public $categories;
    public $salaries;

    public $category_id;
    public $salary_id;
    public $searchTerm;

    public function readDataForm()
    {
        $this->dispatch('readDataForm', $this->searchTerm, $this->category_id, $this->salary_id);
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->salaries = Salary::all();
    }

    public function render()
    {
        return view('livewire.search-vacancy',[
            'categories' => $this->categories,
            'salaries' => $this->salaries,
        ]);
    }
}
