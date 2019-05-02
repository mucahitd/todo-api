<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use Validator, Input, Redirect;



class TasksController extends Controller
{
    /**
     * Show Task Dashboard
     */

    public function show() {

        $tasks = Task::orderBy('created_at', 'asc')->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    /**
    * Add Task Dashboard
    */

    public function add(Request $request) {
        $currentUser = \Auth::user();

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->belongsTo($currentUser);
        $task->save();

        return redirect('/');
    }

    /**
     * Delete Task Dashboard
     */

    public function delete(Task $task) {

        $task->delete();

        return redirect('/');
    }
}
