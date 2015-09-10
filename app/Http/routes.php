<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function() use ($app) {
    return $app->welcome();
});


$app->get('api/quote','QuoteController@index');

$app->get('api/quote/{id}','QuoteController@getQuote');

$app->post('api/quote','QuoteController@saveQuote');

$app->put('api/quote/{id}','QuoteController@updateQuote');

$app->delete('api/quote/{id}','QuoteController@deleteQuote');