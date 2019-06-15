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
    return view('home');
    // for enable login
    // return redirect('home');
});

Auth::routes([ 'register' => false ]);

Route::get('/home', 'HomeController@index')->name('home');

// Group wib-cpanel
Route::group(['middleware' => 'guest' ], function(){

	Route::get('ujian/index', 'UjianController@ujian')->name('ujian');
	Route::get('ujian/start', 'UjianController@ujian_mulai')->name('ujian_mulai');
	
	Route::get('lamar/index', 'LamarController@lamar')->name('lamar');

	
});//End Route::Group wib-cpanel
