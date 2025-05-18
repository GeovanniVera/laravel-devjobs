<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Gate;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     * Mostrar todas las vacantes
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('viewAny', Vacancy::class);
        return view('vacancies.index',);
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar el formulario para crear una nueva vacante
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('create', Vacancy::class);
        return view('vacancies.create',);

    }

    // /**
    //  * Store a newly created resource in storage.
    //  * Almacenar una nueva vacante en la base de datos
    //  * @param \Illuminate\Http\Request $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     * Mostrar una vacante específica
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        return view('vacancies.show',['vacancy'=>$vacancy]);
    }

    /**
     * Show the form for editing the specified resource.
     * Mostrar el formulario para editar una vacante
     * @param \App\Models\Vacancy $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        Gate::authorize('update', $vacancy);
        return view('vacancies.edit',['vacancy'=>$vacancy]);
    }

    // /**
    //  * Update the specified resource in storage.
    //  * Actualizar una vacante existente
    //  * @param \Illuminate\Http\Request $request
    //  * @param \App\Models\Vacancy $vacancy
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  * Eliminar una vacante existente
    //  * @param \App\Models\Vacancy $vacancy
    //  * @return \Illuminate\Http\Response
    //  * @throws \Exception
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
