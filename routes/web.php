<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', function () {
    return view('student.index',['title' => 'Student']);
});
Route::get('/student/creat', function () {
    return view('student.creat',['title' => 'Student']);
});
