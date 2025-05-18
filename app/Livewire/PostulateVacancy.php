<?php

namespace App\Livewire;

use App\Models\Candidate;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostulateVacancy extends Component
{

    public $cv;
    public $vacancy;

    use WithFileUploads;

    // Define los eventos que escuchará el componente
    protected $listeners = ['confirmDeletePostulation' => 'deletePostulation'];

    // Definir las reglas de validación
    protected $rules = [
        'cv' => 'required|mimes:pdf|max:2048',
    ];

    // Definir los mensajes de error personalizados
    protected $messages = [
        'cv.required' => 'El CV es obligatorio.',
        'cv.mimes' => 'El CV debe ser un archivo PDF.',
        'cv.max' => 'El CV no debe pesar más de 2MB.',
    ];

    // Definir los campos cuando se cargue el componente
    public function mount(Vacancy $vacancy)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $this->vacancy = $vacancy;
    }

    //funcion para postularse a una vacante
    public function postulate()
    {

        // Validar el archivo del CV
        $data = $this->validate();

        // guardar el CV en el directorio 'cvs' dentro de 'public'
        $cvPath = $this->cv->store('cvs', 'public');
        $data['cv'] = str_replace('cvs/', '', $cvPath);

        // Crear el registro en la tabla 'candidates' usando la relacion en 'vacancy'
        $this->vacancy->candidates()->create([
            'user_id' => Auth::id(),
            'vacancy_id' => $this->vacancy->id,
            'cv' => $data['cv'],
        ]);

        session()->flash('message', 'Postulación exitosa.');
        redirect()->back();
    }

    //funcion para eliminar la postulación
    public function deletePostulation(Candidate $postulate)
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        // Verificar si la postulación pertenece al usuario autenticado
        if ($postulate->user_id !== Auth::id()) {
            session()->flash('error', 'No puedes eliminar esta postulación.');
            return redirect()->back();
        }
        // Verificar si la postulación pertenece a la vacante actual
        if ($postulate->vacancy_id !== $this->vacancy->id) {
            session()->flash('error', 'No puedes eliminar esta postulación.');
            return redirect()->back();
        }

        //Eliminamos el archivo del CV
        Storage::disk('public')->delete('cvs/' . $postulate->cv);

        // Eliminar la postulación
        $postulate->delete();

        // Redirigir al usuario a la página anterior con un mensaje disparador de sweetalert
        $this->dispatch('postulationDeleted');

    }



    //Funcion para renderizar la vista
    public function render()
    {
        return view('livewire.postulate-vacancy');
    }
}
