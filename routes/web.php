<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'AppController@newest');
Route::get('/about', 'AppController@about');
Route::get('/add', 'AppController@add');
Route::post('/add', 'AppController@add');
Route::get('/popular', 'AppController@popular');
Route::get('/notFound', 'AppController@notFound');
Route::get('/omg/{id}', ['as' => 'id', 'uses' => 'AppController@rate']);
Route::get('/wtf/{id}', ['as' => 'id', 'uses' => 'AppController@rate']);
Route::get('/rss', 'AppController@rss');

Route::get('/{id}', ['as' => 'id', 'uses' => 'AppController@quote']);
