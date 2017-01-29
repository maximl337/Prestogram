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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('discover', 'PictureController@index');

Route::get('upload', 'PictureController@create');

Route::post('upload', 'PictureController@store');

Route::get('users/{id}/pictures', 'PictureController@userPictures');

Route::get('pictures', 'PictureController@myPictures');