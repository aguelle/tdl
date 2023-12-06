@extends('page')

@section('content')

@if ($errors->any())
<div class="">
    <ul>@foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    
</div>
@endif

<form id="" class="" action="{{ @route('task.update', ['id'=>$task->id]) }}" method="post">
    @csrf
    <input id="name" type="text" name="name" value="{{ $task->name }}">
    <input type="submit" value="mofifier">
</form>

@endsection