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
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->group(['prefix' => 'users'], function() use ($router){
        $router->post('login', 'AuthController@login');
        $router->get('logout', 'AuthController@logout');
        $router->get('me', 'AuthController@me');
        $router->post('', 'UserController@createUser');
    });
 });

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/users/{id}', 'UserController@getById');

$router->get('/clients/{id}', 'ClientController@getById');
$router->get('/clients', 'ClientController@getAll');

$router->get('/appointments/{id}', 'AppointmentController@getById');
$router->get('/appointments/users/{id_users}', 'AppointmentController@getByUser');
$router->get('/appointments/clients/{id_clients}', 'AppointmentController@getByClient');
$router->post('/appointments', 'AppointmentController@createAppointment');
$router->put('/appointments/{id}', 'AppointmentController@updateAppointment');
$router->delete('/appointments/{id}', 'AppointmentController@deleteAppointment');

$router->get('/users/{id}','UserController@getById');

$router->get('/property/{id}','PropertyController@getById');

$router->get('/properties','PropertyController@getAll');

$router->post('/properties','PropertyController@create');

$router->delete('/properties/{id}','PropertyController@delete');

$router->put('/properties/{id}','PropertyController@update');