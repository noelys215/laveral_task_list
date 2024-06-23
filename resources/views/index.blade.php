@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <div>
        <a href="{{route('tasks.create')}}">Add Task</a>
    </div>
    @forelse($tasks as $task)
        <ul>
            <li>
                <a href="{{route('tasks.show', ['task' => $task->id])}}">
                    {{$task->title}}
                </a>
            </li>
        </ul>
    @empty
        <li>There are no tasks!</li>
    @endforelse

    @if($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
