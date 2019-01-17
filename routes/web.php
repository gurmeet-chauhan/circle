<?php

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'StatusController@index');
    Route::get('/home', 'HomeController@index')->name('home');


    Route::post('/status', 'StatusController@store');
    Route::delete('/status/{status}', 'StatusController@destroy');
    Route::get('/like/{id}', 'StatusController@like');

    Route::get('/search', 'SearchController@search');
    Route::post('/process', 'SearchController@process');
    Route::get('/user/profile/{id}', 'UserController@index');

    Route::get('/inbox', 'ChatController@inbox');
    Route::get('/messages/{id}', 'ChatController@messages');
    Route::post('/message', 'ChatController@send');
    Route::any('/chat/{id}', 'ChatController@start');
});