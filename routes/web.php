<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TeacherTimetableController;
Route::get('/', function () {
    return view('welcome');
});





Route::prefix('teacher-timetable')->group(function () {
    Route::get('/', [TeacherTimetableController::class, 'index'])->name('teacher.timetable.index');
    Route::get('/create', [TeacherTimetableController::class, 'create'])->name('teacher.timetable.create');
    Route::post('/', [TeacherTimetableController::class, 'store'])->name('teacher.timetable.store');
    Route::get('/{teacher}', [TeacherTimetableController::class, 'show'])->name('teacher.timetable.show');
    Route::get('/edit/{timetableEntry}', [TeacherTimetableController::class, 'edit'])->name('teacher.timetable.edit');
    Route::put('/{timetableEntry}', [TeacherTimetableController::class, 'update'])->name('teacher.timetable.update');
    Route::delete('/{timetableEntry}', [TeacherTimetableController::class, 'destroy'])->name('teacher.timetable.destroy');
});

