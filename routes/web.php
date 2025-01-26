<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CandidateSubmitController;
use App\Http\Controllers\Admin\CandidateDetailController;

Route::get('/', \App\Http\Controllers\HomepageController::class)->name('homepage');
Route::post('/search', \App\Http\Controllers\SearchController::class)->name('search');
Route::get('/search', \App\Http\Controllers\SearchController::class)->name('search');
Route::get('/candidates/{year}/{slug}', \App\Http\Controllers\CandidateController::class)->name('candidates');

Route::get('/candidates/submit', [\App\Http\Controllers\CandidateController::class, 'create'])->name('candidates.submit');
Route::post('/candidates/submit', [\App\Http\Controllers\CandidateController::class, 'store'])->name('candidates.store');


Route::get('/questionnaire/{candidate_id}', [\App\Http\Controllers\QuestionnaireController::class, 'create'])->name('questionnaire.create');


Route::middleware(['auth', 'role:admin|manager|'])->group(function () {
    // is logged in
    Route::get('/dashboard', \App\Http\Controllers\Admin\DashboardController::class)->middleware(['auth', 'role:manager|author|admin'])->name('dashboard');
    Route::get('/manage/candidates/list', \App\Http\Controllers\Admin\CandidateListController::class)->name('manage.candidates.list');
    Route::get('/manage/candidates/{candidate_id}', \App\Http\Controllers\Admin\CandidateDetailController::class)->name('manage.candidates.view');
    Route::put('/manage/candidates/{candidate_id}', [CandidateDetailController::class, 'update'])->name('manage.candidates.edit');
    Route::delete('/manage/candidates/{candidate_id}', [CandidateDetailController::class, 'destroy'])->name('manage.candidates.delete');
});

require __DIR__.'/auth.php';
