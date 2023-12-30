<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FieldsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormTemplateController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\FormSubmissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    // crud opration
    Route::resource('categories', CategoryController::class);
    Route::resource('form-templates', FormTemplateController::class);
    Route::resource('fields', FieldsController::class);
    Route::resource('organization', OrganizationController::class);


    Route::get('form/submit/{id}', [FormSubmissionController::class, 'showForm'])->name('form.create');
    Route::post('form/{formTemplateId}/submit', [FormSubmissionController::class, 'submitForm'])->name('form.store');

    Route::get('/submitted-data', [FormSubmissionController::class, 'AllSubmittedData'])->name('all.submitted.data');
    Route::get('/forms', [FormTemplateController::class, 'forms'])->name('forms.index');



});

require __DIR__.'/auth.php';
