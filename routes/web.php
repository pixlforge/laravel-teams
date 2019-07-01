<?php

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Teams
 */
Route::namespace('Teams')->group(function () {
    Route::resource('/teams', 'TeamController');
});
