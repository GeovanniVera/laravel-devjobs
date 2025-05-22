<?php

namespace App\Livewire;

use App\Models\Vacancy;
use Livewire\Component;
use Livewire\WithPagination;

class ShowHomeVacancies extends Component
{
    use WithPagination;

    public $category;
    public $salary;
    public $searchTerm;

    protected $listeners = [
        'readDataForm' => 'search',
    ];

    public function search($searchTerm, $category, $salary)
    {
        $this->searchTerm = $searchTerm;
        $this->category = $category;
        $this->salary = $salary;
        $this->resetPage(); // Resetea la paginación al aplicar nuevos filtros
    }

    public function getVacanciesProperty()
    {
        return Vacancy::when($this->searchTerm, function ($query) {
            $query->where('title', 'like', '%' . $this->searchTerm . '%');
        })->when($this->searchTerm, function ($query) {
            $query->orWhere('company', 'like', '%' . $this->searchTerm . '%');
        })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->salary, function ($query) {
                $query->where('salary_id', $this->salary);
            })
            ->latest()
            ->paginate(10);
    }

    public function render()
    {
        return view('livewire.show-home-vacancies', ['vacancies' => $this->vacancies]);
    }
}
