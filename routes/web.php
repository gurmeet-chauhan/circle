<?php

Route::get('/', 'StatusController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/status', 'StatusController@store');
Route::delete('/status/{status}', 'StatusController@destroy');

Route::post('/user/search', 'HomeController@search');