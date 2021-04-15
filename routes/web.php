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
    // led
    $router->get('led', 'LedController@getAll');
    $router->post('led', ['middleware' => 'auth', 'uses' => 'LedController@create']);
    $router->get('led/{ledId}', 'LedController@get');
    $router->post('led/{ledId}', ['middleware' => 'auth', 'uses' => 'LedController@update']);

    // color
    $router->get('/led/{ledId}/color', 'ColorController@get');
    $router->post('led/{ledId}/color', ['middleware' => 'auth', 'uses' => 'ColorController@update']);
});

$router->delete('/led/{ledId}', 'LedController@delete');