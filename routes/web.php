<?php

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/student', [StudentController::class, 'index']);

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/Create', [StudentController::class, 'Create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

route:: resource('Department', DepartmentController::class);
route:: resource('lecturer', LecturerController::class);