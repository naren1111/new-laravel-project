<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/edit/user/', 'userController@edit')->name('user.edit');
Route::post('/edit/user/', 'userController@update')->name('user.update');

Route::get('/listing/user/', 'listController@listing')->name('user.list');
Route::get('/addproduct/user/', 'listController@addproduct')->name('user.addproduct');
Route::post('/addproduct/user/', 'listController@create')->name('user.insetproduct');
Route::get('/delete/{id}', 'listController@destroy')->name('user.deleteproduct');
Route::get('/edit product/{id}', 'listController@edit')->name('user.editproduct');
Route::post('/productupdate/{updateid}', 'listController@update')->name('user.updateproduct');

Route::get('/tasks', 'TaskController@index')->name('task.index');
Route::get('/create', 'TaskController@create')->name('task.create');
Route::post('/store', 'TaskController@store')->name('task.store');
Route::post('/update/{id}', 'TaskController@update')->name('task.update');
Route::get('/edit/task/{id}', 'TaskController@edit')->name('task.edit');
Route::get('/delete/task/{id}', 'TaskController@destroy')->name('task.delete');