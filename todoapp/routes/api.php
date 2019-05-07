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
    Route::get('/', 'TasksController@show');
    Route::post('/task', 'TasksController@add');
    Route::delete('/task/{task}','TasksController@delete');
    Route::post('/register','Auth\RegisterController@register');
    });


