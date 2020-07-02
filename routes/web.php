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
    return view('welcome');
})->name('main');

//login and register
Route::get('/register', 'LoginController@register')->name('registeruser');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/login', 'LoginController@login')->name('login');

//user
Route::post('user/add', 'UserController@store')->name('storeuser');

//forum
Route::get('/forum', 'ForumController@index')->name('indexforum');
Route::get('/forum/add', 'ForumController@add')->name('addforum');
Route::post('/forum/store', 'ForumController@store')->name('storeforum');
Route::get('/forum/list', 'ForumController@list')->name('listforum');
Route::get('/forum/edit/{id}', 'ForumController@edit')->name('editforum');
Route::post('/forum/update/{id}', 'ForumController@update')->name('updateforum');
Route::get('/forum/detail/{id}', 'ForumController@detail')->name('detailforum');
Route::get('/forum/delete/{id}', 'ForumController@destroy');

