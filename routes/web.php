<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('add-member');
});

Route::get('/add-member', [
    'uses'=>'UserController@index',
    'as'=>'add.member'
]);
Route::post('/register-member',[
   'uses'=>'UserController@registerMember',
   'as'=>'register.member'
]);
Route::get('/all-members',[
    'uses'=>'UserController@allMembers',
    'as'=>'all.members'
]);
Route::get('/edit-member/{id}',[
    'uses'=>'UserController@editMember',
    'as'=>'edit.member'
]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
