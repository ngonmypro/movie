<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');

Auth::routes();


$router->group(['middleware' => 'auth'], function () use ($router) {
    Route::resource('movie_manage', 'MovieController');
    Route::post('review/comment', 'RatingController@Post');
    Route::resource('user_manage', 'UserController');
});

Route::get('movie_manage/detail/{param}', 'MovieController@show');
// Route::resource('movie_manage', 'MovieController')->middleware('auth');
