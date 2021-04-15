<?php

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('led', 'LedController@getAll');
    $router->post('led', ['middleware' => 'auth', 'uses' => 'LedController@create']);
    $router->get('led/{ledId}', 'LedController@get');
    $router->put('led/{ledId}', ['middleware' => 'auth', 'uses' => 'LedController@update']);
    $router->post('led/{ledId}/color', ['middleware' => 'auth', 'uses' => 'ColorController@update']);
});

//$router->get('/led', 'LedController@getAll');
//
//$router->post('/led', 'LedController@create');
//
//$router->get('/led/{ledId}', 'LedController@get');
//
//$router->put('/led/{ledId}', 'LedController@update');

$router->delete('/led/{ledId}', 'LedController@delete');

$router->get('/led/{ledId}/color', 'ColorController@get');

$router->put('/led/{ledId}/color', 'ColorController@update');
