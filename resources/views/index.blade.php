<h1>
    Hello!
</h1>
<br>
<div>
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
</div>
