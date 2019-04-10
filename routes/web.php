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

Auth::routes();

Route::group(['middleware' => ['auth', 'semak_admin'] ], function() {

    Route::get('users/export', 'UserController@export')->name('users.export');
    Route::get('users/datatables', 'UserController@datatables')->name('users.datatables');
    Route::resource('users', 'UserController');

    Route::get('programs/datatables', 'ProgramController@datatables')->name('programs.datatables');
    Route::resource('programs', 'ProgramController');

    Route::get('peserta/export', 'PesertaController@export')->name('peserta.export');
    Route::get('peserta/datatables', 'PesertaController@datatables')->name('peserta.datatables');
    
    Route::get('peserta/{peserta}/print', 'PesertaController@print')->name('peserta.print');

    Route::resource('peserta', 'PesertaController')->parameters([
        'peserta' => 'peserta'
    ]);

    Route::get('statistik', 'StatistikController@index')->name('statistik.index');


    Route::get('notifications/{id}', 'NotificationController@markAsRead')->name('notifications.read');
    Route::delete('notifications', 'NotificationController@destroy')->name('notifications.destroy');

});

Route::get('/home', 'HomeController@index')->name('home');




