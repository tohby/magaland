<?php

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes(['register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('magazines', 'MagazineController');
Route::resource('comment', 'CommentController');
Route::resource('publish', 'PublishController');
Route::resource('contributions', 'ContributionController');
Route::get('magazines/{magazine}/user/{user}', 'MagazineController@studentContribution');