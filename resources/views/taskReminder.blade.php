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

<form id="" class="" action="{{ @route('task.reminder', ['id'=>$task->id]) }}" method="post">
    @csrf
    <input id="reminder" type="datetime-local" name="reminder" value="{{ $task->reminder }}">
    <input type="submit" value="valider">
</form>

@endsection