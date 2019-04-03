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
});
Route::get('users/datatables', 'UserController@datatables')->name('users.datatables');
Route::resource('users', 'UserController');
Route::resource('programs', 'ProgramController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
