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
Route::get('/members',['uses'=>'ApiController@allMembers']);

Route::get('/projects',['uses'=>'ApiController@allProjects']);

Route::get('/minutes',['uses'=>'ApiController@allMinutes']);

Route::get('/contributions',['uses'=>'ApiController@allContributions']);

Route::get('/contribution/{id}',['uses'=>'ApiController@myContribution']);

Route::get('/last-minutes',['uses'=>'ApiController@lastMinutes']);

Route::post('login', 'Auth\LoginController@login');
