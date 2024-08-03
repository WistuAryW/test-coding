<?php


use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExtraController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/change-password', [ProfileController::class, 'changePassword']);
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students-create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students-store', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students-edit-{id}', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/update/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/destroy/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

    Route::get('/extracurriculars', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
    Route::get('/extracurriculars-create', [ExtracurricularController::class, 'create'])->name('extracurriculars.create');
    Route::post('/extracurriculars/store', [ExtracurricularController::class, 'store'])->name('extracurriculars.store');
    Route::get('/extracurriculars-edit-{id}', [ExtracurricularController::class, 'edit'])->name('extracurriculars.edit');
    Route::put('/extracurriculars/update/{id}', [ExtracurricularController::class, 'update'])->name('extracurriculars.update');
    Route::delete('/extracurriculars/destroy/{id}', [ExtracurricularController::class, 'destroy'])->name('extracurriculars.destroy');

    Route::get('/students-extra', [StudentExtraController::class, 'index'])->name('studentsextra.index');
    Route::post('/extra/store', [StudentExtraController::class, 'store'])->name('extra.store');
    Route::get('/dashboard', [StudentExtraController::class, 'dashboard'])->name('dashboard');
});

require __DIR__.'/auth.php';
