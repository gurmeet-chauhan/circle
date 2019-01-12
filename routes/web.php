<?php

Route::get('/', 'StatusController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/status', 'StatusController@store');
Route::delete('/status/{status}', 'StatusController@destroy');

Route::any('/user/search', 'HomeController@search');

Route::get('/user/profile/{id}', 'UserController@index');

Route::get('/like/{id}', 'StatusController@like');