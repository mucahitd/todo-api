<?php

use App\Task;
use Illuminate\Http\Request;

    Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'TasksController@show');
    Route::post('/task', 'TasksController@add');
    Route::delete('/task/{task}','TasksController@delete');

});