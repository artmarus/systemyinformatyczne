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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Categories
Route::resource('categories', 'CategoryController');
Route::get('/categories/{category}/delete', ['as' => 'categories.delete', 'uses' => 'CategoryController@destroy']);

// Photos
Route::resource('photos', 'PhotoController');
Route::get('/photos/{photo}/delete', ['as' => 'photos.delete', 'uses' => 'PhotoController@destroy']);

// Rate
Route::get('/rate/show/{photo}', ['as' => 'rate.show', 'uses' => 'RateController@show']);
Route::post('/rate/store', ['as' => 'rate.store', 'uses' => 'RateController@store']);
