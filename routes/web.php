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
    Route::get('/teams/{team}/delete', 'TeamController@delete')
        ->name('teams.delete');

    Route::resource('/teams', 'TeamController');

    Route::get('/teams/{team}/users/{user}/remove', 'TeamUserController@remove')
        ->name('teams.users.remove');
    
    Route::resource('/teams/{team}/users', 'TeamUserController')
        ->names([
            'index' => 'teams.users.index',
            'store' => 'teams.users.store',
            'destroy' => 'teams.users.destroy',
        ]);
    
    Route::resource('/teams/{team}/subscriptions', 'TeamSubscriptionController')
        ->names([
            'index' => 'teams.subscriptions.index',
            'store' => 'teams.subscriptions.store',
        ]);
});
