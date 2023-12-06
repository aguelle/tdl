<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- @vite('resources/css/app.css') -->
    <title>@yield('title')</title>
</head>

<body>
    <h1>@yield('title')</h1>
    <nav>
        <ul>
            <li><a href="{{ @route('home') }}">Home🏠</a></li>
            <li><a href="{{ @route('task.add') }}">Ajouter une tache➕</a></li>
            <li><a href="{{ @route('task.done') }}">Liste des tâches effectuées</a></li>
        </ul>
    </nav>

    <main>
        @if (session('success'))
        <div class="notification">{{session('success')}}</div>
        <div class="notification">{{session('errors')}}</div>
        @endif

        @section('content')
        content
        @show
    </main>
</body>

</html>