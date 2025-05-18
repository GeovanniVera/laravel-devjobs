<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[VacancyController::class, 'index'] )->middleware(['auth', 'verified'])->name('vacancies.index');
Route::get('/vacancy/create',[VacancyController::class, 'create'] )->middleware(['auth', 'verified'])->name('vacancies.create');
Route::get('/vacancy/{vacancy}/edit',[VacancyController::class, 'edit'] )->middleware(['auth', 'verified'])->name('vacancies.edit');
Route::get('/vacancy/{vacancy}',[VacancyController::class, 'show'] )->name('vacancies.show');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
