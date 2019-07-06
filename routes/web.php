<?php
use App\Models\Plan;

Auth::routes();

Route::get('/', function () {

    dd(Plan::teams()->get());
    
    // return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Teams
 */
Route::namespace('Teams')->group(function () {
    Route::get('/teams/{team}/delete/confirmation', 'TeamDeleteConfirmationController')->name('teams.delete.confirmation');
    Route::resource('/teams', 'TeamController');
    Route::resource('/teams/{team}/users', 'TeamUserController')
        ->names([
            'index' => 'teams.users.index',
            'store' => 'teams.users.store',
        ]);
});
