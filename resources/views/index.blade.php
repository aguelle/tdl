@extends('page')

@section('title', $title)

@section('content')
<ul>
    @foreach ( $tasks as $task )
    <li> {{ $task->name }} {{$task->reminder}}
        @if ($route ==='home')
        <a href="{{ @route('task.finished',['id'=> $task->id]) }}">✅</a>
        @else
        <a href="{{ @route('task.unfinished',['id'=> $task->id]) }}">❌</a>
        @endif
        <a href="{{ @route('task.delete',['id'=> $task->id]) }}">🗑️</a>
        <a href="{{ @route('task.edit',['id'=> $task->id]) }}">✏️</a>
        <a href="{{ @route('task.up',['id'=> $task->id]) }}">🔼</a>
        <a href="{{ @route('task.down',['id'=> $task->id]) }}">🔽</a>
        <a href="{{ @route('task.reminder',['id'=> $task->id]) }}">🔔</a>
    </li>
    @endforeach
</ul>
@endsection