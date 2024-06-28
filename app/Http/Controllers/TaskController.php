<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('index', ['tasks' => Task::latest()->paginate(6)]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task Created Successfully!');
    }

    public function show(Task $task)
    {
        return view('show', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return view('edit', ['task' => $task]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.show', ['task' => $task->id])
            ->with('success', 'Task Updated Successfully!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')
            ->with('success', 'Task Deleted Successfully!');
    }

    public function toggleComplete(Task $task)
    {
        $task->toggleComplete();
        return redirect()->back()->with('success', 'Task Updated Successfully!');
    }
}
