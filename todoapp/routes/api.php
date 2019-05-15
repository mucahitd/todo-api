<?php

use Illuminate\Http\Request;
use App\Task;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

    Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
    });

    Route::get('/tasks/', 'TasksController@index')->middleware('auth:api');
    Route::post('/task/add', 'TasksController@add')->middleware('auth:api');
    Route::delete('/task/{task}','TasksController@delete')->middleware('auth:api');
    Route::get('/tasks/{task}','TasksController@show')->middleware('auth:api');
    Route::post('/register','Auth\RegisterController@register');

