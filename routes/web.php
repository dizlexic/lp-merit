<?php

use App\Http\Controllers\Admin\CandidateDetailController;
use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\HomepageController::class)->name('homepage');
Route::post('/search', \App\Http\Controllers\SearchController::class)->name('search');
Route::get('/search', \App\Http\Controllers\SearchController::class)->name('search');
Route::get('/candidates/{year}/{slug}', \App\Http\Controllers\CandidateController::class)->name('candidates.show');

Route::get('/candidates/submit', [\App\Http\Controllers\CandidateController::class, 'create'])->name('candidates.submit');
Route::post('/candidates/submit', [\App\Http\Controllers\CandidateController::class, 'store'])->name('candidates.store');

Route::get('/questionnaire/{candidate}', [\App\Http\Controllers\QuestionnaireController::class, 'create'])->name('questionnaire.create');

Route::middleware(['auth'])->group(function () {
    Route::get('/questionnaire/{candidate}/edit', [\App\Http\Controllers\QuestionnaireController::class, 'edit'])->name('questionnaire.edit');
    Route::put('/questionnaire/{candidate}', [\App\Http\Controllers\QuestionnaireController::class, 'update'])->name('questionnaire.update');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['role:admin|author|moderator'])->group(function () {
    Route::get('/manage', \App\Http\Controllers\Admin\DashboardController::class)->middleware(['auth', 'role:manager|author|admin'])->name('admin.dashboard');
    Route::get('/manage/candidates/list', \App\Http\Controllers\Admin\CandidateListController::class)->name('manage.candidates.list');
    Route::get('/manage/candidates/{candidate_id}', \App\Http\Controllers\Admin\CandidateDetailController::class)->name('manage.candidates.view');
    Route::put('/manage/candidates/{candidate_id}', [CandidateDetailController::class, 'update'])->name('manage.candidates.edit');
    Route::delete('/manage/candidates/{candidate_id}', [CandidateDetailController::class, 'destroy'])->name('manage.candidates.delete');
});

require __DIR__.'/auth.php';
