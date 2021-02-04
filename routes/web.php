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
    $router->group(['prefix' => 'clients'], function() use ($router){
        $router->get('{id}', 'ClientController@getById');
        $router->get('', 'ClientController@getAll');
    });
    $router->group(['prefix' => 'appointments'], function() use ($router) {
        $router->get('{id}', 'AppointmentController@getById');
        $router->get('users/{userId}', 'AppointmentController@getByUser');
        $router->get('client/{clientId}', 'AppointmentController@getByClient');
        $router->post('', 'AppointmentController@createAppointment');
        $router->put('{id}', 'AppointmentController@updateAppointment');
        $router->delete('{id}', 'AppointmentController@deleteAppointment');
    });
    $router->group(['prefix' => 'properties'], function() use ($router){
        $router->get('{id}', 'PropertyController@getById');
        $router->get('', 'PropertyController@getAll');
        $router->get('/clients/{clientId}', 'PropertyController@getByClient');
        $router->get('/clientWishes/{clientWishId}', 'PropertyController@getByClientWish');
        $router->post('', 'PropertyController@create');
        $router->put('{id}', 'PropertyController@update');
        $router->delete('{id}', 'PropertyController@delete');
    });
 });

$router->get('/', function () use ($router) {
    return $router->app->version();
});
