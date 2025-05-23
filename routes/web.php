<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\NotificationCotroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard',[VacancyController::class, 'index'] )->middleware(['auth', 'verified','reclutier'])->name('vacancies.index');
Route::get('/vacancy/create',[VacancyController::class, 'create'] )->middleware(['auth', 'verified'])->name('vacancies.create');
Route::get('/vacancy/{vacancy}/edit',[VacancyController::class, 'edit'] )->middleware(['auth', 'verified'])->name('vacancies.edit');
Route::get('/vacancy/{vacancy}',[VacancyController::class, 'show'] )->name('vacancies.show');
Route::get('/candidates/{vacancy}',[CandidateController::class, 'index'] )->middleware(['auth', 'verified','reclutier'])->name('candidates.index');
//Notificaciones
Route::get('/notifications',[NotificationCotroller::class,'__invoke'] )->middleware(['auth', 'verified','reclutier'])->name('notifications.index');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
