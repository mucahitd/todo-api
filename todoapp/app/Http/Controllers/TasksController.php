<?php

namespace App\Http\Controllers;

use App\Task;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator, Input, Redirect;
use App\Http\Requests\StoreTaskRequest;




class TasksController extends Controller
{
    /**
     * Show Task Dashboard
     */

    public function show()
    {

        $tasks = Task::with('user')->orderBy('created_at', 'asc')->get();

        if ($tasks == null) {

            return response()->json($tasks, 204);
        }

        return response()->json($tasks, 200);
    }

    /**
     * Add Task Dashboard
     */

    public function add(StoreTaskRequest $request)
    {
        $currentUser = \Auth::user();


        $task = new Task;
        $task->name = $request->get('name');
        $task->user_id = $currentUser->id;
        $task->save();

        return response()->json($task, 201);
    }

    /**
     * Delete Task Dashboard
     */

    public function delete(Task $task)
    {

        $task->delete();

        return response()->json($task, 202);
    }
}
