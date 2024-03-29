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

//Member
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

//Permissions
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
Route::post('/assign-permission/{id}',[
    'uses'=>'MemberController@assignPermission',
    'as'=>'assign.permission'
]);
Route::get('/all-permissions',[
    'uses'=>'MemberController@allPermissions',
    'as'=>'all.permissions'
]);
Route::post('/add-permission',[
    'uses'=>'UserController@registerPermission',
    'as'=>'register.permissions'
]);
Route::get('/permission',[
    'uses'=>'UserController@permission',
    'as'=>'register.permission'
]);

//user profile
Route::get('/profile',[
   'uses'=>'UserController@profile',
   'as'=>'profile'
]);
Route::post('/update-profile/{id}',[
    'uses'=>'UserController@updateProfile',
    'as'=>'update.profile'
]);

//contributions
Route::get('/members',[
    'uses'=>'MemberController@members',
    'as'=>'contribute'
]);
Route::post('/member-contribution',[
    'uses'=>'MemberController@contribution',
    'as'=>'member.contribution'
]);
route::get('/all-contributions',[
    'uses'=>'MemberController@allContributions',
    'as'=>'all.contributions'
]);
Route::get('/my-contribution',[
    'uses'=>'MemberController@myContributions',
    'as'=>'my.contributions'
]);

//Projects
Route::get('/project',function (){
   return view('Projects.add-project');
})->name('project');
Route::post('/add-project',[
    'uses'=>'MemberController@addProject',
    'as'=>'add.project'
]);
Route::get('/all-projects',[
    'uses'=>'MemberController@allProjects',
    'as'=>'all.projects'
]);
Route::get('/edit-project',[
    'uses'=>'MemberController@editProject',
    'as'=>'edit.project'
]);

//Minutes
Route::get('/add-minutes',[
    'uses'=>'UserController@minutes',
    'as'=>'minutes'
]);
Route::post('/upload-minutes',[
    'as'=>'add.minutes',
    'uses'=>'UserController@addMinutes'
]);
Route::get('/all-minutes',[
    'uses'=>'UserController@allMinutes',
    'as'=>'all.minutes'
]);

//Gallery
Route::get('/gallery',[
    'uses'=>'UserController@gallery',
    'as'=>'gallery'
]);
Route::post('/add-gallery',[
   'uses'=>'UserController@addGallery',
   'as'=>'add.gallery'
]);
Route::get('all-photos',[
    'uses'=>'UserController@allPhotos',
    'as'=>'all.photos'
]);

Auth::routes();
Route::get('/logout',[
    'uses'=>'UserController@logout',
    'as'=>'logout'
]);

Route::get('/home', 'HomeController@index')->name('home');
