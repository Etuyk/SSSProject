<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

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

// Colleges
// Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
// Route::get('/colleges/create', [CollegeController::class, 'create'])->name('colleges.create');
// Route::get('/colleges/{id}/edit', [CollegeController::class, 'edit'])->name('colleges.edit');

Route::resource('colleges', CollegeController::class);


// Students
// Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::resource('students', StudentController::class);


Route::get('/', function () {
    return view('welcome');
});
