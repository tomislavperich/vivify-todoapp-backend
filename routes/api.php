<?php

use Illuminate\Http\Request;

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

// User routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
});

// Task routes
Route::group([
    'middleware' => 'api',
    'prefix' => 'task'
], function ($router) {
    // Return all tasks
    Route::get('/', 'TaskController@index');

    // Return single task
    Route::get('/{id}', 'TaskController@show');

    // Create new task
    Route::post('new', 'TaskController@create');

    // Delete task
    Route::put('delete/{id}', 'TaskController@destroy');

    // Edit task
    Route::put('edit/{id}', 'TaskController@edit');
});
