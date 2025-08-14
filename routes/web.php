<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\TeacherTimetable;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/timetable-manager/{teacherId?}', TeacherTimetable::class);


Route::get('/timetable-manager/create/{teacherId?}', TeacherTimetable::class)
    ->name('timetable-manager.create');

