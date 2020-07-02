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
Route::get('/forum/list', 'ForumController@list')->name('listforum');
Route::get('/forum/detail', 'ForumController@detail')->name('detailforum');

