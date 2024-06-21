@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    @forelse($tasks as $task)
        <ul>
            <li>
                <a href="{{route('tasks.show', ['id' => $task->id])}}">
                    {{$task->title}}
                </a>
            </li>
        </ul>
    @empty
        <li>There are no tasks!</li>
    @endforelse
@endsection
