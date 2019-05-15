<?php

namespace App\Http\Controllers;

use App\Task;
use http\Env\Response;
use Illuminate\Http\Request;
use Validator, Input, Redirect;
use App\Http\Requests\StoreTaskRequest;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    /**
     * Show Task Dashboard
     */

    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth('api')->user()->id)->paginate(15);

        return response()->json($tasks, 200);

    }

    public function show(Request $request)
    {
        $task = Task::where(['user_id' => auth('api')->user()->id, 'id' => $request->get('id')])->first();
        return response()->json($task, 200);

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

        if ($task->user_id !== auth('api')->user()->id) {

            return response()->json([], 403);
        }

        if ($task->delete()) {

            return response()->json([], 202);

        }

        return response()->json([], 417);

    }
}
