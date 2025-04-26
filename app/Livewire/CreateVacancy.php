<?php
namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateVacancy extends Component
{
    public $salaries;
    public $categories;

    public $title;
    public $description;
    public $category;
    public $salary;
    public $company;
    public $last_day;
    public $image;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|exists:categories,id',
        'salary' => 'required|exists:salaries,id',
        'company' => 'required|string|max:50',
        'last_day' => 'required|date',
        'image' => 'nullable|image|', // 1MB Max
    ];

    public function createVacancy(){
        $data = $this->validate();

    }

    public function mount()
    {
        $this->salaries = Salary::pluck('salary', 'id');
        $this->categories = Category::pluck('category', 'id');
    }

    public function render()
    {
        return view('livewire.create-vacancy', [
            'salaries' => $this->salaries,
            'categories' => $this->categories, 
        ]);
    }
}