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




Route::get('/', 'HomeController@index')->name('home');


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
Route::post('/update-member/{id}',[
   'uses'=>'UserController@updateMember',
   'as'=>'update.member'
]);
Route::get('/user-permission',[
   'uses'=>'MemberController@userPermission',
   'as'=>'member.permission'
]);
Route::get('/permission/{id}',[
    'uses'=>'MemberController@createRole',
    'as'=>'role'
]);
Route::get('/add-permission/{id}',[
    'uses'=>'MemberController@addPermission',
    'as'=>'add.permission'
]);


Auth::routes();
Route::get('/logout',[
    'uses'=>'UserController@logout',
    'as'=>'logout'
]);

Route::get('/home', 'HomeController@index')->name('home');
