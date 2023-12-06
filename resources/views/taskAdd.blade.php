@extends('page')

@section('title', 'Ma todo liste')

@section('content')

<form id="" class="" action="{{ @route('task.insert') }}" method="POST">
    @csrf
    <input id="name" type="text" name="name" placeholder="nom de la tâche">
    <input type="submit" value="ajouter une tâche">
</form>

@endsection