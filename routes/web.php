<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ClientController;

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
        $router->get('', 'UserController@gets');
        $router->get('logout', 'AuthController@logout');
        $router->get('me', 'AuthController@me');
        $router->get('{id}', 'UserController@get');
        $router->post('', 'UserController@createUser');
        $router->post('login', 'AuthController@login');
        $router->put('{id}', 'UserController@put');
        $router->delete('{id}', 'UserController@delete');
    });
    $router->group(['prefix' => 'clients'], function() use ($router){
        $router->get('', 'ClientController@getAll');
        $router->get('users/{userId}', 'ClientController@getByUser');
        $router->get('count', 'ClientController@countAllClient');
        $router->get('{id}', 'ClientController@getById');
        $router->post('', 'ClientController@create');
        $router->put('{id}', 'ClientController@put');
        $router->delete('{id}', 'ClientController@delete');
    });
    $router->group(['prefix' => 'appointments'], function() use ($router) {
        $router->get('{id}', 'AppointmentController@getById');
        $router->get('users/{userId}/date', 'AppointmentController@getByUserAndDate');
        $router->get('users/{userId}', 'AppointmentController@getByUser');
        $router->get('client/{clientId}', 'AppointmentController@getByClient');
        $router->post('', 'AppointmentController@createAppointment');
        $router->put('{id}', 'AppointmentController@updateAppointment');
        $router->delete('{id}', 'AppointmentController@deleteAppointment');
    });
    $router->group(['prefix' => 'properties'], function() use ($router){
        $router->get('', 'PropertyController@getAll');
        $router->get('{id}', 'PropertyController@getById');
        $router->get('/clients/{clientId}', 'PropertyController@getByClient');
        $router->get('/clientWishes/{clientWishId}', 'PropertyController@getByClientWish');
        $router->post('', 'PropertyController@create');
        $router->put('{id}', 'PropertyController@update');
        $router->delete('{id}', 'PropertyController@delete');
    });
    $router->group(['prefix' => 'clientWishes'], function() use ($router){
        $router->get('{id}', 'ClientWhishController@getById');
        $router->get('clients/{clientId}', 'ClientWhishController@getByClient');
        $router->post('', 'ClientWishController@create');
        $router->put('{id}', 'ClientWishController@put');
        $router->delete('{id}', 'ClientWishController@delete');
    });

    $router->get('appointmentTypes', 'AppointmentTypeController@gets');
    $router->get('clientTypes', 'ClientTypeController@gets');
    $router->get('heaterTypes', 'HeaterTypeController@gets');
    $router->get('propertyTypes', 'PropertyTypeController@gets');
    $router->get('shutterTypes', 'ShutterTypeController@gets');
    $router->get('userTypes', 'UserTypeController@gets');
});

$router->get('/', function () use ($router) {
    return $router->app->version();
});
