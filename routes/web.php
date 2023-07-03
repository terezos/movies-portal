<?php

use App\Http\Controllers\Cinemas\MovieController;
use Illuminate\Support\Facades\Route;



Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    /**
     * Home Routes
     */
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        Route::resource('cinema', \App\Http\Controllers\Cinemas\CinemaController::class,  [
            'names' => [
                'index'   =>   'cinema.cinemas',
                'store'   =>   'cinema.store',
                'edit'    =>   'cinema.edit',
                'show'    =>   'cinema.show',
                'update'  =>   'cinema.update',
                'destroy' =>   'cinema.destroy',
                'create'  =>   'cinema.create'
            ]
        ]);

        Route::resource('movies', \App\Http\Controllers\Cinemas\MovieController::class,  [
            'names' => [
                'index'   =>   'movie.movies',
                'store'   =>   'movie.store',
                'edit'    =>   'movie.edit',
                'show'    =>   'movie.show',
                'update'  =>   'movie.update',
                'destroy' =>   'movie.destroy',
                'create'  =>   'movie.create'
            ]
        ]);
        Route::get('/movie-search/{id}', [MovieController::class, 'findImdbMovieById'])->name('movie.search');
    });
});
