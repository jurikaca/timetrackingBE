<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/time/log_time', 'TimesController@log_time')->middleware('cors')->name('log_time');
Route::get('/time/get_time', 'TimesController@get_time')->middleware('cors')->name('get_time');
