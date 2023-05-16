<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'task'])->name('task');
Route::get('/task-view{task_id}', [App\Http\Controllers\TaskController::class, 'taskView'])->name('task.view');
Route::post('/add-task', [App\Http\Controllers\TaskController::class, 'addTask'])->name('add.task');
Route::get('/delete{task_id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('task.delete');
Route::get('/confirm{task_id}', [App\Http\Controllers\TaskController::class, 'confirm'])->name('task.confirm');
Route::post('/update{task_id}', [App\Http\Controllers\TaskController::class, 'update'])->name('task.update');
