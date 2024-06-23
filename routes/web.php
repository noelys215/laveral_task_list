<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
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

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

/* Get Single Task */
Route::get('/tasks/{task}', function (Task $task) {
    return view('show', [
        'task' => $task
    ]);
})->name('tasks.show');

/* Post Task */
Route::post('/tasks', function (TaskRequest $request) {
    $task = Task::create($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Created Successfully!');
})->name('tasks.store');/* Post Task */

/* Edit Task */
Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());

    return redirect()->route('tasks.show', ['task' => $task->id])
        ->with('success', 'Task Updated Successfully!');
})->name('tasks.update');

/* Delete Task */
Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success', 'Task Deleted Successfully!');
})->name('tasks.destroy');

/* Error Page */
Route::fallback(function () {
    return 'Where are you?';
});
