<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Salary;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

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

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|exists:categories,id',
        'salary' => 'required|exists:salaries,id',
        'company' => 'required|string|max:50',
        'last_day' => 'required|date',
        'image' => 'nullable|image|max:1024', // 1MB Max
    ];

    protected $messages = [
        'title.required' => 'El título es obligatorio.',
        'title.string' => 'El título debe ser una cadena de texto.',
        'title.max' => 'El título no puede tener más de 255 caracteres.',

        'description.required' => 'La descripción es obligatoria.',
        'description.string' => 'La descripción debe ser una cadena de texto.',

        'category.required' => 'La categoría es obligatoria.',
        'category.exists' => 'La categoría seleccionada no es válida.',

        'salary.required' => 'El salario es obligatorio.',
        'salary.exists' => 'El salario seleccionado no es válido.',

        'company.required' => 'El nombre de la empresa es obligatorio.',
        'company.string' => 'El nombre de la empresa debe ser una cadena de texto.',
        'company.max' => 'El nombre de la empresa no puede tener más de 50 caracteres.',

        'last_day.required' => 'La fecha límite es obligatoria.',
        'last_day.date' => 'La fecha límite debe ser una fecha válida.',

        'image.image' => 'El archivo debe ser una imagen.',
        'image.max' => 'La imagen no debe pesar más de 1MB.',
    ];


    public function createVacancy()
    {
        $data = $this->validate();

        //Almacenar Imagen
        $imagenPath = $this->image->store('vacancies', 'public');
        $imageName = str_replace('public/vacancies/', '', $imagenPath);
        //Crear la vacante
        Vacancy::create([
            'salary_id' => $data['salary'],
            'category_id'=> $data['category'],
            'title'=> $data['title'],
            'company'=> $data['company'],
            'last_day'=> $data['last_day'],
            'description'=> $data['description'],
            'image'=> $imageName,
            'user_id'=> Auth::user()->id,
        ]);
        //Crear un mensaje
        session()->flash('message','La vacante se publico correctamente');
        //Redireccionar al usuario
        redirect()->route('vacancies.index');
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
