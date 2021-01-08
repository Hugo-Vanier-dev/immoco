<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users/{id}', 'UserController@getById');

$router->get('/clients/{id}', 'ClientController@getById');
$router->get('/clients', 'ClientController@getAll');

$router->get('/appointments/{id}', 'AppointmentController@getById');
$router->get('/appointments/users/{userId}', 'AppointmentController@getByUser');
$router->get('/appointments/clients/{clientId}', 'AppointmentController@getByClient');