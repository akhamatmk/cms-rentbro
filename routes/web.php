<?php

Route::get('login')->uses('Auth\LoginController@index')->name('login');
Route::post('login')->uses('Auth\LoginController@check');
Route::get('login')->uses('Auth\LoginController@index')->name('login');



Route::group(['prefix' => '/',  'middleware' => 'auth'],function () {
    
    Route::get('/', function () {
	    return view('layout/ex');
	});

	Route::get('home', function () {
	    return view('layout/ex');
	});
    
    Route::resource('category', 'Admin\CategoryController');

});