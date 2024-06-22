<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

/* Get All Recent Tasks */
Route::get('/tasks', function () {
    return view('index',
        [
            'tasks' => Task::latest()->get(),
        ]);
})->name('tasks.index');

/* Create Form View */
Route::view('/tasks/create', 'create')->name('tasks.create');

/* Get Single Task */
Route::get('/tasks/{id}', function ($id) {
    return view('show', [
        'task' => Task::findOrFail($id)
    ]);
})->name('tasks.show');

/* Post Task */
Route::post('/tasks', function (Request $request) {
    dd($request->all());
})->name('tasks.store');

/* Error Page */
Route::fallback(function () {
    return 'Where are you?';
});
