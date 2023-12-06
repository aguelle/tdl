<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Redirect;

class TaskController extends Controller
{
    /**
     * Display a listing of the tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'route'=>'home',
            'title' => 'Ma to do liste',
            'tasks' => Task::where('state', 1)
                ->orderBy('priority')
                ->get()
        ];
        return view('index', $data);
    }

    /**
     * Display a listing of the done tasks.
     *
     * @return \Illuminate\Http\Response
     */
    public function done()
    {
        $data = [
            'route'=>'done',
            'title' => 'Tâches effectuées',
            'tasks' => Task::where('state', 0)
                ->orderBy('priority')
                ->get()
        ];
        return view('index', $data);
    }

    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('taskAdd');
    }

    /**
     * Store a newly created task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->input('name');
        $task->save();
        return Redirect::route('home')->with('success', 'Tâche ajoutée');
    }

    /**
     * Display the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('taskEdit', ['task' => Task::find($id)]);
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
            ],
            [
                'name' => [
                    'required' => 'le nom de la tâche doit être saisie.',
                    'max' => 'le nom de la tâche est limité à 255 caractères'
                ]
            ]
        );
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->save();
        return Redirect::route('home');
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editreminder($id)
    {
        return view('taskReminder', ['task' => Task::find($id)]);
    }

    /**
     * Update the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reminder(Request $request, $id)
    {
        $request->validate(
            [
                'reminder' => 'required',
            ],
            [
                'reminder.required' => 'veuillez saisir une date de rappel.'
        
            ]
        );
        $task = Task::find($id);
        $task->reminder = $request->input('reminder');
        $task->save();
        return Redirect::route('home');
    }

    /**
     * Up the specified priority task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function up(Request $request, $id)
    {
        $task = Task::find($id);
        $task->decrement('priority');
        $task->save();
        return Redirect::route('home');
    }

    /**
     * Down the specified priority task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function down(Request $request, $id)
    {
        $task = Task::find($id);
        $task->increment('priority');
        $task->save();
        return Redirect::route('home');
    }

    /**
     * Finish(validate) the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function finish(Request $request, $id)
    {

        $task = Task::find($id);
        $task->state = 0;
        $task->save();
        return Redirect::route('home')->with('success', 'Tâche terminée');
    }

    /**
     * Finish(validate) the specified task in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unfinish(Request $request, $id)
    {
        $task = Task::find($id);
        $task->state = 1;
        $task->save();
        return Redirect::route('task.done')->with('success', 'Tâche à faire');
    }

    /**
     * Remove the specified task from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return Redirect::route('home')->with('success', 'Tâche supprimée');
    }
}
