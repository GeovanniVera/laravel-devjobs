<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Salary;
use App\Models\Category;
use Livewire\WithFileUploads;
use App\Models\Vacancy;
use Illuminate\Support\Carbon;

class EditVacancy extends Component
{


    public $salaries;
    public $categories;

    public $id;
    public $title;
    public $description;
    public $category;
    public $salary;
    public $company;
    public $last_day;
    public $image;
    public $newImage;

    use WithFileUploads;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'category' => 'required|exists:categories,id',
        'salary' => 'required|exists:salaries,id',
        'company' => 'required|string|max:50',
        'last_day' => 'required|date',
        'newImage' => 'nullable|image|max:1024',
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

        'newImage.image' => 'El archivo debe ser una imagen.',
        'newImage.max' => 'La imagen no debe pesar más de 1MB.',
    ];

    // Método para cargar los datos iniciales
    public function mount(Vacancy $vacancy)
    {
        $this->id = $vacancy->id;
        $this->salaries = Salary::pluck('salary', 'id');
        $this->categories = Category::pluck('category', 'id');
        $this->title = $vacancy->title;
        $this->description = $vacancy->description;
        $this->category = $vacancy->category_id;
        $this->salary = $vacancy->salary_id;
        $this->company = $vacancy->company;
        $this->last_day = Carbon::parse($vacancy->last_day)->format('Y-m-d');
        $this->image = $vacancy->image;

    }
    // Método para actualizar la vacante
    public function updateVacancy()
    {
        $data = $this->validate();

        if ($this->newImage) {

            //Subir la nueva imagen
           $image = $this->newImage->store('vacancies', 'public');
            //Asignar la nueva imagen a la vacante
            $data['image'] = str_replace('public/vacancies/', '', $image);
        }
        //buscar si existe una imagen
        $vacancy = Vacancy::find($this->id);

        //Encontrar la vacante a editar

        //Asignar los valores a la vacante
        $vacancy->title = $data['title'];
        $vacancy->description = $data['description'];
        $vacancy->category_id = $data['category'];
        $vacancy->salary_id = $data['salary'];
        $vacancy->company = $data['company'];
        $vacancy->last_day = $data['last_day'];
        $vacancy->image = $data['image'] ?? $this->image;
        //Guardar la vacante

        $vacancy->save();
        //Redireccionar a la lista de vacantes
        session()->flash('message', 'Vacante actualizada correctamente.');
        return redirect()->route('vacancies.index');

    }

    public function render()
    {
        return view('livewire.edit-vacancy',[
            'salaries'=>$this->salaries,
            'categories'=>$this->categories
        ]);
    }
}
